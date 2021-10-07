<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Weigth_control;
use App\Http\Requests\StoreWeigthC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Weigth_controlExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Weigth_controlController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:controlPeso.index')->only('index');
        $this->middleware('can:controlPeso.create')->only('create','store');
        $this->middleware('can:controlPeso.edit')->only('show','edit','update');
        $this->middleware('can:controlPeso.destroy')->only('delete');
    }

    public function index()
    {
        $pesoC = DB::table('weigth_control')
                ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                ->select('weigth_control.id'
                ,'weigth_control.date',
                'file_animale.animalCode as animal',
                'weigth_control.weigtht',
                'weigth_control.date_r',
                'weigth_control.actual_state')
                ->where('weigth_control.actual_state','=','ACTIVO')
                ->get();
        return view('weigthC.index-weigthC',compact('pesoC'));
    }
    public function PDF(){
        $pesoC = DB::table('weigth_control')
                ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                ->select('weigth_control.id'
                ,'weigth_control.date',
                'file_animale.animalCode as animal',
                'weigth_control.weigtht',
                'weigth_control.date_r',
                'weigth_control.actual_state')
                ->where('weigth_control.actual_state','=','ACTIVO')
                ->get();
        $pdf = PDF::loadView('weigthC.pdf',compact('pesoC'));

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
        $actvividad->view ='CONTROL PESO';
        $actvividad->data = 'ControlesPesosActivos.pdf';
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('ControlesPesosActivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='CONTROL PESO';
        $actvividad->data ='ControlesPesosActivos.xlsx';
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
        return Excel::download(new Weigth_controlExport, 'ControlesPesosActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


    public function create()
    {
        $animal = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')
                  
        ->get();
        return view('weigthC.create-weigthC',compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeigthC $request)
    {
        $pesoC = new Weigth_control();
       
        $pesoC->date = $request->date;
        $pesoC->animalCode_id = $request->animalCode_id;
        $pesoC->weigtht = $request->weigtht;
        $pesoC->date_r = $request->date_r;
        $pesoC-> actual_state = $request-> actual_state;

        $pesoC->save(); 
         
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='CONTROL PESO';

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
        
        
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
       
        return redirect('/controlPeso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('weigthC.edit-weigthC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')
                  
        ->get();
        return view('weigthC.edit-weigthC', compact('pesoC','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWeigthC $request, $id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC->date = $request->date;
        $pesoC->animalCode_id = $request->animalCode_id;
        $pesoC->weigtht = $request->weigtht;
        $pesoC->date_r = $request->date_r;
        $pesoC-> actual_state = $request-> actual_state;
       
        $pesoC->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL PESO';

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
        
        
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
       
        return redirect('/controlPeso');
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
