<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\File_partum;
use App\Models\Vitamin;
use App\Http\Requests\StoreFile_partum;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_partumExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class File_partumController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaParto.index')->only('index');
        $this->middleware('can:fichaParto.create')->only('create','store');
        $this->middleware('can:fichaParto.edit')->only('show','edit','update');
        $this->middleware('can:fichaParto.destroy')->only('delete');
    }



    public function index()
    {
        $par = DB::table('file_partum')
            ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
            ->select('file_partum.id',
                    'file_partum.date',
                    'file_animale.animalCode as animal',
                    'file_partum.male',
                    'file_partum.female',
                    'file_partum.dead',
                    'file_partum.mother_status',
                    'file_partum.partum_type',
                    'file_partum.actual_state'
                    )->where('file_partum.actual_state','=','Disponible')
                    
            ->get();

      return view('file_partum.index-partum',compact('par'));
    }
    public function PDF(){
        $par = DB::table('file_partum')
        ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
        ->select('file_partum.id',
                'file_partum.date',
                'file_animale.animalCode as animal',
                'file_partum.male',
                'file_partum.female',
                'file_partum.dead',
                'file_partum.mother_status',
                'file_partum.partum_type',
                'file_partum.actual_state'
                )->where('file_partum.actual_state','=','Disponible')
                
        ->get();
        $pdf = PDF::loadView('file_partum.pdf',compact('par'));

        $actvividad = new  Activity();
        $user = Auth::user()->name;
        $id = Auth::user()->id;
        $rol = Auth::user()->roles->pluck('rol');
        $correo = Auth::user()->email;
        $actvividad->log_name = $user;
        $actvividad->email = $correo;

        $super= str_replace('"','',$rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='FICHA PARTO';
        $actvividad->data = 'FichasPartosActivos.pdf';
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('FichasPartosActivos-'.date('Y-m-d H:i:s').'.pdf');
    }

    public function Excel(){
        $actvividad = new  Activity();
        $user = Auth::user()->name;
        $id = Auth::user()->id;
        $rol = Auth::user()->roles->pluck('rol');
        $correo = Auth::user()->email;
        $actvividad->log_name = $user;
        $actvividad->email = $correo;

        $super= str_replace('"','',$rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='FICHA PARTO';
        $actvividad->data = 'FichasPartosActivos.xlsx';
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();
        return Excel::download(new File_partumExport, 'FichasPartosActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'gestation_state',
                     'actual_state'
                  )
                  ->where('gestation_state','=','SI')
                  ->where('actual_state','=','DISPONIBLE')
                  
        ->get();
        return view('file_partum.create-partum',compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_partum $request)
    {
        $par = new File_partum();
       
        $par->date= $request->date;
        $par->animalCode_id = $request->animalCode_id;
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        $par->mother_status = $request->mother_status;
        $par->partum_type = $request->partum_type;
        $par->actual_state = $request->actual_state;
        
        $par->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA PARTO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
            }
        }
        
        $actvividad->data = $animal_Code;
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();

        return redirect('/fichaParto')->with('Validad','ok');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_partum.edit-partum',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $par =  File_partum::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'gestation_state',
                     'actual_state'
                  )
                  ->where('gestation_state','=','SI')
                  ->where('actual_state','=','DISPONIBLE')
                  
        ->get();
                  
        
        return view('file_partum.edit-partum',compact('animal','par'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_partum $request, $id)
    {
        $par =  File_partum::findOrFail($id);

        $par->date= $request->date;
        $par->animalCode_id = $request->animalCode_id;
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        $par->mother_status = $request->mother_status;
        $par->partum_type = $request->partum_type;
        $par->actual_state = $request->actual_state;
        
        $par->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA PARTO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();

        return redirect('/fichaParto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
