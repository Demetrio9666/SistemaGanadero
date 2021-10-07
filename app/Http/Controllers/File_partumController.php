<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\File_reproduction_artificial;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_external;
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
                    )->where('file_partum.actual_state','=','ACTIVO')
                    
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
                )->where('file_partum.actual_state','=','ACTIVO')
                
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
                  ->where('actual_state','=','ACTIVO')
                  
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

        $animalB  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        $re_A = DB::table('file_reproduction_artificial')
        ->select('id',
                'animalCode_id_m',
                'actual_state'
                )
                ->where('actual_state','=','ACTIVO')
                
        ->get(); 
        $re_MI = DB::table('file_reproduction_internal')
        ->select('id',
                 'animalCode_id_m',
                 'actual_state'
                )->where('actual_state','=','ACTIVO')
                
        ->get();
        $ext =  DB::table('file_reproduction_external')
        ->select('id',
                'animalCode_id',
                'actual_state')
                ->where('actual_state','=','ACTIVO')     
        ->get();
     
        foreach($animalB as $i){
            if($request->animalCode_id ==$i->id){
                $id_b=$i->id;
                $animal_estado = File_Animale::findOrFail($id_b);
                $animal_estado->gestation_state = "NO";
                $animal_estado->update(); 
            }
        }
       
        foreach($ext as $i3){

            if($i3->animalCode_id == $id_b){
                ////////////MONTA EXTERNA/////////////////////
                foreach($ext  as $a2){
                    foreach($animalB as $a1){
                        if($a1->id == $a2->animalCode_id){
                            $id_MEX=$a2->id;
                            $estado_artificial = file_reproduction_external::findOrFail($id_MEX);
                            $estado_artificial->actual_state ="INACTIVO";
                            $estado_artificial->update();
                            $luz ="verde";
                            break;
                        }
                    }
                   
                }
            }
        }

        
            foreach( $re_A as $i2){
                if($i2->animalCode_id_m == $id_b){
                    ////////ARTIFICIAL////////////////////
                    foreach($re_A  as $a2){
                        foreach($animalB as $a1){
                            if($a1->id == $a2->animalCode_id_m){
                                $id_arti=$a2->id;
                                $estado_artificial = file_reproduction_artificial::findOrFail($id_arti);
                                $estado_artificial->actual_state ="INACTIVO";
                                $estado_artificial->update();
                                $luz ="verde";
                                break;
                            }
                        }
                    
                    }
                }    
            }
            
        
     

        foreach($re_MI as $i){
            if( $i->animalCode_id_m == $id_b){
                ///////////MONTA INTERNA/////////////////
                foreach($re_MI  as $a2){
                    foreach($animalB as $a1){
                        if($a1->id == $a2->animalCode_id_m){
                            $id_MI=$a2->id;
                            $estado_artificial = file_reproduction_internal::findOrFail($id_MI);
                            $estado_artificial->actual_state ="INACTIVO";
                            $estado_artificial->update();
                            $luz ="verde";
                            break;
                        }
                    }
                   
                }
               

            }

        }

       

         
                      
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        
        $estadoMadre = $request->mother_status;
        if($estadoMadre == "MUERTA"){
            foreach($animalB as $i){
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "INACTIVO";
                    $animal_estado->update(); 
                }
            }
        }
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
                  ->where('actual_state','=','ACTIVO')
                  
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

        $animalB  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
                  $re_A = DB::table('file_reproduction_artificial')
                  ->select('id',
                          'animalCode_id_m',
                          'actual_state'
                          )
                          ->where('actual_state','=','ACTIVO')
                          
                  ->get(); 
                  $re_MI = DB::table('file_reproduction_internal')
                  ->select('id',
                           'animalCode_id_m',
                           'actual_state'
                          )->where('actual_state','=','ACTIVO')
                          
                  ->get();
                  $ext =  DB::table('file_reproduction_external')
                  ->select('id',
                          'animalCode_id',
                          'actual_state')
                          ->where('actual_state','=','ACTIVO')
                              
                  ->get();
        foreach($animalB as $i){
            if($request->animalCode_id ==$i->id){
                $id_b=$i->id;
                $animal_estado = File_Animale::findOrFail($id_b);
                $animal_estado->gestation_state = "NO";
                $animal_estado->update(); 
            }
        }
        foreach($ext as $i3){
            if($i3->animalCode_id == $id_b){
                ////////////MONTA EXTERNA/////////////////////
                foreach($ext  as $a2){
                    foreach($animalB as $a1){
                        if($a1->id == $a2->animalCode_id){
                            $id_MEX=$a2->id;
                            $estado_artificial = file_reproduction_external::findOrFail($id_MEX);
                            $estado_artificial->actual_state ="INACTIVO";
                            $estado_artificial->update();
                            $luz ="verde";
                            break;
                        }
                    }
                   
                }
            }
        }

        
            foreach( $re_A as $i2){
                if($i2->animalCode_id_m == $id_b){
                    ////////ARTIFICIAL////////////////////
                    foreach($re_A  as $a2){
                        foreach($animalB as $a1){
                            if($a1->id == $a2->animalCode_id_m){
                                $id_arti=$a2->id;
                                $estado_artificial = file_reproduction_artificial::findOrFail($id_arti);
                                $estado_artificial->actual_state ="INACTIVO";
                                $estado_artificial->update();
                                $luz ="verde";
                                break;
                            }
                        }
                    
                    }
                }    
            }
            
        
     

        foreach($re_MI as $i){
            if( $i->animalCode_id_m == $id_b){
                ///////////MONTA INTERNA/////////////////
                foreach($re_MI  as $a2){
                    foreach($animalB as $a1){
                        if($a1->id == $a2->animalCode_id_m){
                            $id_MI=$a2->id;
                            $estado_artificial = file_reproduction_internal::findOrFail($id_MI);
                            $estado_artificial->actual_state ="INACTIVO";
                            $estado_artificial->update();
                            $luz ="verde";
                            break;
                        }
                    }
                   
                }
               

            }

        }

        $par->date= $request->date;
        $par->animalCode_id = $request->animalCode_id;
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        $estadoMadre = $request->mother_status;
        foreach($animalB as $i){
            if($estadoMadre == "MUERTA"){
                
                    if($request->animalCode_id ==$i->id){
                        $id_b=$i->id;
                        $animal_estado = File_Animale::findOrFail($id_b);
                        $animal_estado->actual_state = "INACTIVO";
                        $animal_estado->update(); 
                    
                }
            }else {
                if($request->animalCode_id ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }

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
