<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Models\File_animale;
use App\Models\Antibiotic;
use App\Models\File_treatment;
use App\Http\Requests\StoreFile_treatment;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_treatmentExport;
use Spatie\Activitylog\Models\Activity;

class File_treatmentController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaTratamiento.index')->only('index');
        $this->middleware('can:fichaTratamiento.create')->only('create','store');
        $this->middleware('can:fichaTratamiento.edit')->only('show','edit','update');
        $this->middleware('can:fichaTratamiento.destroy')->only('delete');
    }

    public function index()
    {
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','Disponible')    
                
        ->get();

      return view('file_treatment.index-treatment',compact('tra'));
    }
    public function PDF(){
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','Disponible')    
                
        ->get();
        $pdf = PDF::loadView('file_treatment.pdf',compact('tra'));
        return $pdf->setPaper('a4','landscape')->download('FichaTratamiento.pdf');
    }
    public function Excel() {
        return Excel::download(new File_treatmentExport, 'FichaTratamiento.xlsx');
    }


  /////////////////////////////////////////////////////////////////////////////////////////7
    public function create()
    {   
        $anti = Antibiotic::all();
        $vitamina = Vitamin::all();
        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'actual_state'
                     
                  )
                  ->where('health_condition','=','Enfermo')
                  ->where('actual_state','=','Disponible')->orwhere('actual_state','=','Reproduccion')
                  
        ->get();
        return view('file_treatment.create-treatment',compact('vitamina','animalT','anti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_treatment $request)
    {
        $tra = new File_treatment();
       
        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
        $tra->actual_state = $request->actual_state;
        

        $tra->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA TRATAMIENTO';

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
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return redirect('/fichaTratamiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_treatment.edit-treatment',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tra = File_treatment::findOrFail($id);
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','Disponible')
       ->get();
        $vitamina = DB::table('vitamin')
        ->select('vitamin.id',
        'vitamin.vitamin_d',
        'vitamin.actual_state')
        ->where('vitamin.actual_state','=','Disponible')
        ->get();


        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'actual_state'
                     
                  )
                  ->where('health_condition','=','Enfermo')
                  ->where('actual_state','=','Disponible')->orwhere('actual_state','=','Reproduccion')
                  
        ->get();
        return view('file_treatment.edit-treatment',compact('vitamina','animalT','anti','tra'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_treatment $request, $id)
    {
        $tra = File_treatment::findOrFail($id);
        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
        $tra->actual_state = $request->actual_state;
        $tra->save(); 
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA TRATAMIENTO';

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
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return redirect('/fichaTratamiento');
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
