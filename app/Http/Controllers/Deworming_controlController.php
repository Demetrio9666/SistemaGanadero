<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Dewormer;
use App\Models\Deworming_control;
use App\Http\Requests\StoreDewormerC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Deworming_controlExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Deworming_controlController extends Controller
{
    public function __construct(){
        $this->middleware('can:controlDesparasitacion.index')->only('index');
        $this->middleware('can:controlDesparasitacion.create')->only('create','store');
        $this->middleware('can:controlDesparasitacion.edit')->only('show','edit','update');
        $this->middleware('can:controlDesparasitacion.destroy')->only('delete');
    }

    public function index()
    {
        $desC = DB::table('deworming_control')
                ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
                ->leftJoin('dewormer','deworming_control.deworming_id','=','dewormer.id')
                ->select('deworming_control.id',
                         'deworming_control.date',
                         'file_animale.animalCode as animal',
                         'dewormer.dewormer_d as des',
                         'deworming_control.date_r',
                         'deworming_control.actual_state')
                         ->where('deworming_control.actual_state','=','ACTIVO')
                ->get();
        return view('dewormerC.index-dewormerC',compact('desC'));
        //return $desC;
    }
    public function PDF(){
        $desC = DB::table('deworming_control')
                ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
                ->leftJoin('dewormer','deworming_control.deworming_id','=','dewormer.id')
                ->select('deworming_control.id',
                         'deworming_control.date',
                         'file_animale.animalCode as animal',
                         'dewormer.dewormer_d as des',
                         'deworming_control.date_r',
                         'deworming_control.actual_state')
                         ->where('deworming_control.actual_state','=','ACTIVO')
                ->get();
                $pdf = PDF::loadView('dewormerC.pdf',compact('desC'));

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
                $actvividad->data = 'ControlesDesparacitacionesActivos';
                $actvividad->view ='CONTROL DESPARASITACION';

                $actvividad->subject_type =('App\Models\Deworming_control');
            
                $actvividad->save();
                return $pdf->setPaper('a4','landscape')->download('ControlesDesparasitacionesActivos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->data = 'ControlesDesparacitacionesActivos.xlsx';
        $actvividad->view ='CONTROL DESPARASITACION';

        $actvividad->subject_type =('App\Models\Deworming_control');
    
        $actvividad->save();
        return Excel::download(new Deworming_controlExport, 'ControlesDesparasitacionesActivos'.date('Y-m-d H:i:s').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $des =  DB::table('dewormer')
        ->select('id',
                'dewormer_d'
                )->where('actual_state','=','ACTIVO')
        ->get();

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();
                  
        
        return view('dewormerC.create-dewormerC',compact('animal','des'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDewormerC $request)
    {
        
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();
        $desCC = DB::table('deworming_control')
                    ->select('id',
                            'date',
                            'animalCode_id',
                            'deworming_id',
                            'date_r',
                            'actual_state')
                            ->where('actual_state','=','ACTIVO')
        ->get();

       
     $desC = new Deworming_control();

      

       foreach($desCC as $i){
        if($i->animalCode_id == $request->animalCode_id){
            if( $i->deworming_id == $request->deworming_id ){   
                 $codigo= $request->codigo_animal;
                 $desp =$request->deworming_id;
            //return with('Existe','o');
             return view('mensajes.controldesp',compact('codigo','desp','desCC')); 
            // return redirect('/controlVacuna')-with('validacion','ok');
            
            }
        }
    }
     

       $desC->date = $request->date;
       $desC->animalCode_id = $request->animalCode_id;
       $desC->deworming_id = $request->deworming_id;
       $desC->date_r = $request->date_r;
       $desC->actual_state = $request->actual_state;
       
       $desC->save(); 

       $actvividad = new  Activity();
       $actvividad->log_name = $request->usuario;
       $actvividad->email = $request->correo;

       $super= str_replace('"','',$request->rol);
       $super2= str_replace('[','',$super);
       $super3= str_replace(']','',$super2);

       $actvividad->rol =$super3 ;
       $actvividad->subject_id =$request->id;
       $actvividad->description =('CREAR');
       $actvividad->view ='CONTROL DESPARASITACION';

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
       
       
       $actvividad->subject_type =('App\Models\Deworming_control');
   
       $actvividad->save();
            //return redirect()->route();
        return redirect('/controlDesparasitacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dewormerC.edit-dewormerC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $des =  DB::table('dewormer')
        ->select('id',
                'dewormer_d'
                )->where('actual_state','=','ACTIVO')
        ->get();

        $desC = Deworming_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();

        return view('dewormerC.edit-dewormerC', compact('desC','des','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDewormerC $request, $id)
    {
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','ACTIVO')->ORwhere('actual_state','=','REPRODUCCIÓN')
                  
        ->get();
        $desCC = DB::table('deworming_control')
                    ->select('id',
                            'date',
                            'animalCode_id',
                            'deworming_id',
                            'date_r',
                            'actual_state')
                            ->where('actual_state','=','ACTIVO')
        ->get();
        $desC = Deworming_control::findOrFail($id);
        $id;
        foreach($desCC as $i2){
            if($i2->id == $id){
                 $idcodigoAnimal=$i2->animalCode_id;
                 $fecha=$i2->date ;
                 $iddesp=$i2->deworming_id ;
                 $fecha_r=$i2->date_r;
                 $estado =$i2->actual_state ;
            }
           
        }
        foreach($desCC as $i){
            if($idcodigoAnimal != $request->animalCode_id  ||  $fecha !=  $request->date ||  $fecha_r !=  $request->date_r || $estado != $request->actual_state){
                break;
            }elseif($idcodigoAnimal == $request->animalCode_id ) {
               
                if( $i->deworming_id == $request->deworming_id ){      
                    $codigo= $request->codigo_animal;
                    $desp =$request->deworming_id;
                
                     return view('mensajes.controldespEdit',compact('codigo','desp','desCC')); 
                
                }
            }elseif ($iddesp != $request->deworming_id && $fecha != $request->date ||  $fecha_r !=  $request->date_r || $estado != $request->actual_state) {
                   if($idcodigoAnimal == $request->animalCode_id){
                        break;
                   }
            }elseif ( $iddesp != $request->deworming_id ) {
                    if($idcodigoAnimal == $request->animalCode_id){
                        break;
                   }
            }elseif ($idcodigoAnimal != $request->animalCode_id &&  $iddesp != $request->deworming_id) {
                  foreach($desCC as $i3){
                        if($i->animalCode_id == $request->animalCode_id){
                            if( $i->deworming_id == $request->deworming_id ){      
                                $codigo= $request->codigo_animal;
                                $desp =$request->deworming_id;
                        
                                 return view('mensajes.controldespEdit',compact('codigo','desp','desCC')); 
                            
                            
                            }
                        }
                  }
            }
        }




        

        $desC->date = $request->date;
        $desC->animalCode_id = $request->animalCode_id;
        $desC->deworming_id = $request->deworming_id;
        $desC->date_r = $request->date_r;
        $desC->actual_state = $request->actual_state;
      
        $desC->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL DESPARASITACION';

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
        
        
        $actvividad->subject_type =('App\Models\Deworming_control');
    
        $actvividad->save();

        return redirect('/controlDesparasitacion');

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
