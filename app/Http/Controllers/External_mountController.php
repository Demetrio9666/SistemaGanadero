<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_artificial;
use App\Models\File_reproduction_external;
use App\Models\File_animale;
use App\Http\Requests\StoreFile_reproductionEX;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_reproduction_externalExport;
use Spatie\Activitylog\Models\Activity;


class External_mountController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaReproduccionEx.index')->only('index');
        $this->middleware('can:fichaReproduccionEx.create')->only('create','store');
        $this->middleware('can:fichaReproduccionEx.edit')->only('show','edit','update');
        $this->middleware('can:fichaReproduccionEx.destroy')->only('delete');
    }


    public function index()
    {   
        $ext =  DB::table('file_reproduction_external')
                ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
                ->leftJoin('race as R','file_animale.race_id','=','R.id')
                ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
                ->select('file_reproduction_external.id',
                            'file_reproduction_external.date',
                            'file_animale.animalCode',
                            'R.race_d as raza',
                            'file_animale.age_month as edad',
                            'file_animale.sex as sexo',
                            'file_reproduction_external.animalCode_Exte',
                            'race.race_d',
                            'file_reproduction_external.age_month',
                            'file_reproduction_external.sex',
                            'file_reproduction_external.hacienda_name',
                            'file_reproduction_external.reproduction_state',
                            'file_reproduction_external.actual_state')
                            ->where('file_reproduction_external.actual_state','=','ACTIVO')
                            
                ->get();

        return view('file_reproductionME.index-external_M',compact('ext'));
    }

    public function PDF(){
        $ext =  DB::table('file_reproduction_external')
        ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
        ->leftJoin('race as R','file_animale.race_id','=','R.id')
        ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
        ->select('file_reproduction_external.id',
                    'file_reproduction_external.date',
                    'file_animale.animalCode',
                    'R.race_d as raza',
                    'file_animale.age_month as edad',
                    'file_animale.sex as sexo',
                    'file_reproduction_external.animalCode_Exte',
                    'race.race_d',
                    'file_reproduction_external.age_month',
                    'file_reproduction_external.sex',
                    'file_reproduction_external.hacienda_name',
                    'file_reproduction_external.reproduction_state',
                    'file_reproduction_external.actual_state')
                    ->where('file_reproduction_external.actual_state','=','ACTIVO')
                    
        ->get();
        $pdf = PDF::loadView('file_reproductionME.pdf',compact('ext'));

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
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';
        $actvividad->data = 'FichasReproduccionesMontasNaturalesExternasActivos.pdf';
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichasReproduccionesMontasNaturalesExternasActivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';
        $actvividad->data = 'FichasReproduccionesMontasNaturalesExternasActivos.xlsx';
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return Excel::download(new File_reproduction_externalExport, 'FichasReproduccionesMontasNaturalesExternasActivos'.date('Y-m-d H:i:s').'.xlsx');
    }


    public function create()
    {
        $raza = DB::table('race')
            ->select('race.id',
                        'race.race_d',
                        'race.percentage',
                        'race.actual_state')
                        ->where('race.actual_state','=','ACTIVO')
                        ->get();

        $animaleEX= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                        'file_animale.animalCode',
                        'file_animale.age_month',
                        'race.race_d as raza',
                        'file_animale.sex')
                ->where('file_animale.actual_state','=','REPRODUCCIÓN') 
                ->where('file_animale.sex','=','HEMBRA')
                

            ->get();
            

        
        return view('file_reproductionME.create-external_M',compact('raza','animaleEX'));
    }


    public function store(StoreFile_reproductionEX $request)
    {
        /*foreach($re_A as $i3){
            foreach($re_MI as $i2){
                foreach( $extt as $i){
                        if($i->animalCode_id == $request->animalCode_id ){
                            return view('mensajes.fichaReproduccionExterna.externa');
                        }elseif($i2->animalCode_id_m == $request->animalCode_id){
                            return view('mensajes.fichaReproduccionExterna.montaInterna'); 
                        } elseif($i3->animalCode_id_m == $request->animalCode_id){
                            return view('mensajes.fichaReproduccionExterna.artificial'); 
                        }         


                }
            }
        }*/

        $ext = new File_reproduction_external();
        
        $ext->date= $request->date;
        $ext->animalCode_id = $request->animalCode_id;
        $ext->animalCode_Exte = $request->animalCode_Exte;
        $ext->race_id = $request->race_id;
        $ext->age_month = $request->age_month;
        $ext->sex = $request->sex;
        $ext->hacienda_name = $request->hacienda_name;

        $estadoActualReproduccion = $request->reproduction_state;
        $estadoActual =$request->actual_state;

        if($estadoActualReproduccion == "EXITOSO"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->gestation_state ="SI";
                    $animal_estado->update(); 
                }
            }
        }elseif ($estadoActual == "FALLIDO") {
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "REPRODUCCIÓN";
                    $animal_estado->update(); 
                }
            }
        }else {
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }
        $ext->reproduction_state =$request->reproduction_state;
        if($estadoActual == "INACTIVO"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
              
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }

        $ext->actual_state = $request->actual_state;
        
       
        $ext->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';

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
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return redirect('/fichaReproduccionEx');
    }


    public function show($id)
    {
        return view('file_reproductionME.edit-external_M',compact('id'));
    }


    public function edit($id)
    {
        $ext =  File_reproduction_external::findOrFail($id);
        $raza = DB::table('race')
                    ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','ACTIVO')
                    ->get();
        $animaleEX= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                        'file_animale.animalCode',
                        'file_animale.age_month',
                        'race.race_d as raza',
                        'file_animale.sex')
                ->where('file_animale.actual_state','=','REPRODUCCIÓN') 
                ->where('file_animale.sex','=','HEMBRA')
                

            ->get();
    
        
        $raza = Race::all();
        return view('file_reproductionME.edit-external_M',compact('ext','raza','animaleEX'));
    }

    public function update(StoreFile_reproductionEX $request, $id)
    {
        $ext =  File_reproduction_external::findOrFail($id);
        $ext->date= $request->date;
        $ext->animalCode_id = $request->animalCode_id;
        $ext->animalCode_Exte = $request->animalCode_Exte;
        $ext->race_id = $request->race_id;
        $ext->age_month = $request->age_month;
        $ext->sex = $request->sex;
        $ext->hacienda_name = $request->hacienda_name;
        $estadoActualReproduccion = $request->reproduction_state;
        $estadoActual =$request->actual_state;

        if($estadoActualReproduccion == "EXITOSO"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->gestation_state ="SI";
                    $animal_estado->update(); 
                }
            }
        }elseif ($estadoActual == "FALLIDO") {
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "REPRODUCCIÓN";
                    $animal_estado->update(); 
                }
            }
        }else {
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }
        $ext->reproduction_state =$request->reproduction_state;
        if($estadoActual == "INACTIVO"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
              
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }

        
       
        $ext->actual_state = $request->actual_state;
        $ext->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';

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
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return redirect('/fichaReproduccionEx');
    }

}
