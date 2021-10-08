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
use Illuminate\Support\Facades\Auth;

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
                 'file_treatment.recovery',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','ACTIVO')    
                
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
                 'file_treatment.recovery',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','ACTIVO')    
                
        ->get();
        $pdf = PDF::loadView('file_treatment.pdf',compact('tra'));

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
        $actvividad->view ='FICHA TRATAMIENTO';
        $actvividad->data = 'FichasTratamientosActivos.pdf';
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichasTratamientosActivos-'.date('Y-m-d H:i:s').'.pdf');
    }
    public function Excel() {
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
        $actvividad->view ='FICHA TRATAMIENTO';
        $actvividad->data = 'FichasTratamientosActivos.xlsx';
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return Excel::download(new File_treatmentExport, 'FichasTratamientosActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


  /////////////////////////////////////////////////////////////////////////////////////////7
    public function create()
    {   
        
        $anti = DB::table('antibiotic')
        ->select('id',
                  'antibiotic_d',
                  'date_e',
                  'date_c',
                  'supplier',
                  'actual_state')
                  ->where('actual_state','=','ACTIVO')
       ->get();
        
        $vitamina= DB::table('vitamin')
        ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
        ->where('actual_state','=','ACTIVO')
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
                  ->where('health_condition','=','ENFERMO')->orwhere('health_condition','=','SANO')
                  ->where('actual_state','=','ACTIVO')->orwhere('actual_state','=','REPRODUCCIÓN')
                  
                  
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
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'actual_state'
                  ) ->where('health_condition','=','ENFERMO')
                    ->where('actual_state','=','ACTIVO')
                  
        ->get();
        $tra1 = DB::table('file_treatment')
        ->select('id',
                 'animalCode_id'
                )->where('actual_state','=','ACTIVO')    
                
        ->get();
        $animalB  = DB::table('file_animale')
                ->select(   'id',
                            'animalCode',
                            'health_condition'  
                        )->get();

        $tra = new File_treatment();

        /*foreach($tra1 as $i){
            if($i->animalCode_id == $request->animalCode_id){
                return view('mensajes.fichaTratamiento.tratamiento');
            }
        }*/
       
        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->recovery =$request->recovery;
        $salud=$request->recovery;
        if($salud == "SI"){
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->health_condition = "SANO";
                    $animal_estado->update(); 
                }
            }

        }elseif ($salud == "NO") {
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->health_condition = "ENFERMO";
                    $animal_estado->update(); 
                }
            }
        }
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
                  ->where('antibiotic.actual_state','=','ACTIVO')
       ->get();
        $vitamina = DB::table('vitamin')
        ->select('vitamin.id',
        'vitamin.vitamin_d',
        'vitamin.actual_state')
        ->where('vitamin.actual_state','=','ACTIVO')
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
                  ->where('health_condition','=','Enfermo')->orwhere('health_condition','=','SANO')
                  ->where('actual_state','=','ACTIVO')
                  ->orwhere('actual_state','=','REPRODUCCIÓN')
                  
                  
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
       
        $tra1 = DB::table('file_treatment')
        ->select('id',
                'date',
                'animalCode_id',
                'disease',
                'detail',
                'antibiotic_id',
                'vitamin_id',
                'recovery',
                'treatment',
                'actual_state'
                )->where('actual_state','=','ACTIVO')    
                
        ->get();
        $animalB  = DB::table('file_animale')
        ->select(   'id',
                    'animalCode',
                    'health_condition'  
                )->get();

        $tra = File_treatment::findOrFail($id);
        $id;

        /*foreach($tra1 as $i2){
            if($i2->id == $id){
                $fecha = $i2->date;
                $idcodigoAnimal=$i2->animalCode_id;
                $enfermedad = $i2->disease;
                $detalle = $i2->detail;
                $anti = $i2->antibiotic_id;
                $vitamina = $i2->vitamin_id;
                $recuperacion= $i2->recovery;
                $tratamiento = $i2->treatment;
                $estado = $i2->actual_state;
            }
        }
        foreach($tra1 as $i){
            if($idcodigoAnimal != $request->animalCode_id || $fecha != $request->date
               || $enfermedad != $request->disease || $detalle != $request->detail 
               || $anti != $request->antibiotic_id || $vitamina != $request->vitamin_id
               || $recuperacion != $request->recovery || $tratamiento != $request->treatment
               || $estado != $request->actual_state){
                break;
            }elseif($idcodigoAnimal == $request->animalCode_id ){
                return view('mensajes.fichaTratamiento.tratamientoEdit');

            }elseif($idcodigoAnimal != $request->animalCode_id && $fecha != $request->date
            || $enfermedad != $request->disease || $detalle != $request->detail 
            || $anti != $request->antibiotic_id || $vitamina != $request->vitamin_id
            || $recuperacion != $request->recovery || $tratamiento != $request->treatment
            || $estado != $request->actual_state){
                break;

            }elseif($idcodigoAnimal == $request->animalCode_id && $fecha != $request->date
            || $enfermedad != $request->disease || $detalle != $request->detail 
            || $anti != $request->antibiotic_id || $vitamina != $request->vitamin_id
            || $recuperacion != $request->recovery || $tratamiento != $request->treatment
            || $estado != $request->actual_state){
                return view('mensajes.fichaTratamiento.tratamientoEdit');
            }
        }*/

        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
        
        $salud=$request->recovery;

        if($salud == "SI"){
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->health_condition = "SANO";
                    $animal_estado->update(); 
                }
            }

        }elseif ($salud == "NO") {
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->health_condition = "ENFERMO";
                    $animal_estado->update(); 
                }
            }
        }
        $tra->recovery =$request->recovery;
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
