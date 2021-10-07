<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;
use App\Http\Requests\StoreVaccineC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Vaccine_controlExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Vaccine_controlController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:controlVacuna.index')->only('index');
        $this->middleware('can:controlVacuna.create')->only('create','store');
        $this->middleware('can:controlVacuna.edit')->only('show','edit','update');
        $this->middleware('can:controlVacuna.destroy')->only('delete');
    }
    
    public function index()
    {
        $vacunaC= DB::table('vaccine_control')
                    ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
                    ->leftJoin('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
                    ->select('vaccine_control.id'
                            ,'vaccine_control.date'
                            ,'vaccine.vaccine_d as vacuna'
                            ,'file_animale.animalCode as animal',
                            'vaccine_control.date_r',
                            'vaccine_control.actual_state'
                            )->where('vaccine_control.actual_state','=','ACTIVO')
                    ->get();
                
         return view('vaccineC.index-vaccineC',compact('vacunaC'));
    }
    public function PDF(){
        $vacunaC= DB::table('vaccine_control')
                    ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
                    ->leftJoin('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
                    ->select('vaccine_control.id'
                            ,'vaccine_control.date'
                            ,'vaccine.vaccine_d as vacuna'
                            ,'file_animale.animalCode as animal',
                            'vaccine_control.date_r',
                            'vaccine_control.actual_state'
                            )->where('vaccine_control.actual_state','=','ACTIVO')
                    ->get();
        $pdf = PDF::loadView('vaccineC.pdf',compact('vacunaC'));

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
        $actvividad->view ='CONTROL VACUNACION';
        $actvividad->data = 'ControlesVacunasActivos.pdf';
   
        
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('ControlesVacunasActivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='CONTROL VACUNACION';
        $actvividad->data = 'ControlesVacunasActivos.xlsx';
   
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();

        return Excel::download(new Vaccine_controlExport, 'ControlesVacunasActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacuna = DB::table('vaccine')
        ->select('id','vaccine_d')
        ->where('actual_state','=','ACTIVO')
        ->get();

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();

        $vacunaC= DB::table('vaccine_control')
        ->select('id',
                'date',
                'animalCode_id',
                'vaccine_id',
                'date_r',
                'actual_state'
                )->where('actual_state','=','ACTIVO')
        ->get();
      

        return view('vaccineC.create-vaccineC',compact('animal','vacuna','vacunaC'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccineC $request )
    {
        
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();

        $vacunaCC= DB::table('vaccine_control')
        ->select('id',
                'date',
                'animalCode_id',
                'vaccine_id',
                'date_r',
                'actual_state'
                )->where('actual_state','=','ACTIVO')
        ->get();

       /* $vacuna_tabla = DB::table('vaccine')
                ->select('id','vaccine_d')
                ->where('actual_state','=','Disponible')
        ->get();*/

        $vacunaC = new Vaccine_control();


        foreach($vacunaCC as $i){
            if($i->animalCode_id == $request->animalCode_id){
               if( $i->vaccine_id == $request->vaccine_id ){      
                     $codigo= $request->codigo_animal;
                     $vacuna =$request->vaccine_id;
                //return with('Existe','o');
                 return view('mensajes.controlVacuna',compact('codigo','vacuna','vacunaCC')); 
                // return redirect('/controlVacuna')-with('validacion','ok');
                
               }
            }
        }
                $vacunaC->date = $request->date;
                $vacunaC->animalCode_id = $request->animalCode_id;
                $vacunaC->vaccine_id = $request->vaccine_id;
                $vacunaC->date_r = $request->date_r;
                $vacunaC->actual_state = $request->actual_state;
                
                $vacunaC->save(); 

                $actvividad = new  Activity();
                $actvividad->log_name = $request->usuario;
                $actvividad->email = $request->correo;

                $super= str_replace('"','',$request->rol);
                $super2= str_replace('[','',$super);
                $super3= str_replace(']','',$super2);

                $actvividad->rol =$super3 ;
                $actvividad->subject_id =$request->id;
                $actvividad->description =('CREAR');
                $actvividad->view ='CONTROL VACUNACION';

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
                
                
                $actvividad->subject_type =('App\Models\Vaccine_control');
            
                $actvividad->save();
                
                //return redirect()->route();
               
               
            
        
        
        return redirect('/controlVacuna');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vaccineC.edit-vaccineC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $vacuna = DB::table('vaccine')
                ->select('id','vaccine_d')
                ->where('actual_state','=','ACTIVO')
        ->get();

        $vacunaC = Vaccine_control::findOrFail($id);
        
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();
        return view('vaccineC.edit-vaccineC', compact('vacunaC','vacuna','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVaccineC $request, $id)
    {
       
        $vacunaCC= DB::table('vaccine_control')
        ->select('id',
                'date',
                'animalCode_id',
                'vaccine_id',
                'date_r',
                'actual_state'
                )->where('actual_state','=','ACTIVO')
        ->get();
        $vacuna = DB::table('vaccine')
            ->select('id','vaccine_d')
            ->where('actual_state','=','ACTIVO')
            ->get();




       $vacunaC = Vaccine_control::findOrFail($id);
       $id;
       
       foreach($vacunaCC as $i2){
           if($i2->id == $id){
                $idcodigoAnimal=$i2->animalCode_id;
                $fecha=$i2->date ;
                $idvacuna=$i2->vaccine_id ;
                $fecha_r=$i2->date_r;
                $estado =$i2->actual_state ;
           }
          
       }
     
       /* foreach($vacunaCC as $i){
               if($i->id == $id){
                   $idcodigoAnimal=$i->animalCode_id;
                   $fecha=$i->date ;
                   $idvacuna=$i->vaccine_id ;
                   $fecha_r=$i->date_r;
                   $estado =$i->actual_state ;
                    if($fecha != $request->date){
                       
                            $verificarCodigo = $request->animalCode_id;
                            $verificarVacuna = $request->vaccine_id;
                           
                            if($estado ==$i->actual_state ){
                                if( $fecha_r == $i->date_r){
                                    if($verificarCodigo == $i->animalCode_id ){
                                        if($verificarVacuna == $i->vaccine_id){
                                        break;
                                        }
                                    }
                               }
                            }
                               
                                
                            
                           
                    }elseif($fecha_r != $request->date_r) {
                           
                            $verificarCodigo = $request->animalCode_id;
                            $verificarVacuna = $request->vaccine_id;
                           
                            if($estado ==$i->actual_state ){
                                if( $fecha == $i->date){
                                    if($verificarCodigo == $i->animalCode_id ){
                                        if($verificarVacuna == $i->vaccine_id){
                                        break;
                                        }
                                    }
                               }
                            }
                            
                        
                    }elseif($estado != $request->actual_state){
                        $verificarCodigo = $request->animalCode_id;
                        $verificarVacuna = $request->vaccine_id;
                       
                        
                            if( $fecha_r == $i->date_r){
                                if( $fecha == $i->date){
                                    if($verificarCodigo == $i->animalCode_id ){
                                        if($verificarVacuna == $i->vaccine_id){
                                        break;
                                        }
                                    }
                                }
                               
                           }
                        
                    }elseif($idcodigoAnimal != $request->animalCode_id){
                        $verificarCodigo = $request->animalCode_id;
                        $verificarVacuna = $request->vaccine_id;

                        foreach($vacunaCC as $i2){
                            if ($i2->animalCode_id != $verificarCodigo){
                                break;
                            }else {
                                if( $i2->vaccine_id == $verificarVacuna){
                                    break;
                                }else {
                                    return 'esta vacuan ya tiene el animal modificado';
                                }
                               
                            }
                        }

                    }
                   
               }
                  
              
           
        }*/
       /* foreach($vacunaCC as $i){
            if($idcodigoAnimal !=  $request->animalCode_id &&  $fecha !=  $request->date &&  $fecha_r !=  $request->date_r ){
                break;
            }elseif( $idcodigoAnimal !=  $request->animalCode_id ||  $fecha !=  $request->date ||  $fecha_r !=  $request->date_r  || $estado != $request->actual_state){
                
            }
        }*/

        foreach($vacunaCC as $i){
            if($idcodigoAnimal != $request->animalCode_id  ||  $fecha !=  $request->date ||  $fecha_r !=  $request->date_r || $estado != $request->actual_state){
                break;
            }elseif($idcodigoAnimal == $request->animalCode_id ) {
               
                if( $i->vaccine_id == $request->vaccine_id ){      
                    $codigo= $request->codigo_animal;
                    $vacuna =$request->vaccine_id;
                
                     return view('mensajes.controlVacunaEdit',compact('codigo','vacuna','vacunaCC')); 
                
                }
            }elseif ($idvacuna != $request->vaccine_id && $fecha != $request->date ||  $fecha_r !=  $request->date_r || $estado != $request->actual_state) {
                   if($idcodigoAnimal == $request->animalCode_id){
                        break;
                   }
            }elseif ( $idvacuna != $request->vaccine_id ) {
                    if($idcodigoAnimal == $request->animalCode_id){
                        break;
                   }
            }elseif ($idcodigoAnimal != $request->animalCode_id &&  $idvacuna != $request->vaccine_id) {
                  foreach($vacunaCC as $i3){
                        if($i->animalCode_id == $request->animalCode_id){
                            if( $i->vaccine_id == $request->vaccine_id ){      
                                $codigo= $request->codigo_animal;
                                $vacuna =$request->vaccine_id;
                        
                                 return view('mensajes.controlVacunaEdit',compact('codigo','vacuna','vacunaCC')); 
                            
                            
                            }
                        }
                  }
            }
        }
            

        $vacunaC->date = $request->date;
        $vacunaC->animalCode_id = $request->animalCode_id;
        $vacunaC->vaccine_id = $request->vaccine_id;
        $vacunaC->date_r = $request->date_r;
        $vacunaC->actual_state = $request->actual_state;
       
        $vacunaC->save(); 
      

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL VACUNACION';

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
        
        
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();
        return redirect('/controlVacuna');
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
