<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_external;
use App\Models\Artificial_Reproduction;
use App\Http\Requests\StoreFile_reproductionA;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_reproduction_artificialExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class File_reproductionAController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaReproduccionA.index')->only('index');
        $this->middleware('can:fichaReproduccionA.create')->only('create','store');
        $this->middleware('can:fichaReproduccionA.edit')->only('show','edit','update');
        $this->middleware('can:fichaReproduccionA.destroy')->only('delete');
    }

    public function index()
    {
       
        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->leftJoin('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->leftJoin('race as f','file_animale.race_id','=','f.id')
                    ->leftJoin('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','ACTIVO')
                            
                    ->get(); 
  
        return view('file_reproductionA.index-reproductionA',compact('re_A'));
    }
    public function PDF(){
        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->leftJoin('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->leftJoin('race as f','file_animale.race_id','=','f.id')
                    ->leftJoin('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','ACTIVO')
                            
                    ->get(); 
        $pdf = PDF::loadView('file_reproductionA.pdf',compact('re_A'));
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
 
        $actvividad->rol =$super3;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL';
        $actvividad->data='FichaReproduccionArtificial.pdf';
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichaReproduccionArtificial-'.date('Y-m-d H:i:s').'.pdf');

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
 
        $actvividad->rol =$super3;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL';
        $actvividad->data='FichasReproduccionesArtificialesActivos.xlsx';
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();

        return Excel::download(new File_reproduction_artificialExport, 'FichasReproduccionesArtificialesActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $re_A = DB::table('file_reproduction_artificial')
                ->select(
                        'animalCode_id_m',
                        )->where('actual_state','=','ACTIVO')
                ->get();

        $animalhembra= DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->select('file_animale.id',
                            'file_animale.animalCode',
                            'file_animale.age_month',
                            'race.race_d as raza',
                            'file_animale.sex')
                    ->where('file_animale.actual_state','=','REPRODUCCIÓN') 
                    ->where('file_animale.sex','=','HEMBRA')
                    

                ->get();

        

        $raza = DB::table('race')
                        ->select('race.id',
                        'race.race_d',
                        'race.percentage',
                        'race.actual_state')
                        ->where('race.actual_state','=','ACTIVO')
                ->get();



        $arti= DB::table('artificial_Reproduction')
                        ->join('race','artificial_Reproduction.race_id','=','race.id')
                        ->select('artificial_Reproduction.id',
                        'race.race_d',
                        'artificial_Reproduction.reproduccion',
                        'artificial_Reproduction.supplier'
                        )->where('artificial_Reproduction.actual_state','=','ACTIVO')
        ->get();  

       
        return view('file_reproductionA.create-reproductionA',compact('raza','animalhembra','arti'));
       //return $animalhembra;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_reproductionA $request)
    {
        /*$re_A = DB::table('file_reproduction_artificial')
                    ->select('id',
                            'date',
                            'animalCode_id_m',
                            'actual_state'
                            )
                            ->where('actual_state','=','DISPONIBLE')
                            
                    ->get(); 
            //return $re_A;
            
        $re_MI = DB::table('file_reproduction_internal')
                    ->select('id',
                             'date',
                             'animalCode_id_m',
                             'actual_state'
                            )->where('actual_state','=','DISPONIBLE')
                            
                    ->get();
                    //return $re_MI;
        $ext =  DB::table('file_reproduction_external')

                    ->select('id',
                            'date',
                            'animalCode_id',
                            'actual_state')
                            ->where('actual_state','=','DISPONIBLE')
                                
                    ->get();*/
             //return $ext;
           
        $re = new File_reproduction_artificial();
    
        /*foreach($ext as $i3){
            foreach($re_MI as $i2){
                foreach($re_A as $i){

                        if( $i->animalCode_id_m == $request->animalCode_id_m){
                            return view('mensajes.fichaReproduccionArtificial.artificial'); 
                        }elseif($i2->animalCode_id_m == $request->animalCode_id_m){
                            return view('mensajes.fichaReproduccionArtificial.montaInterna'); 
                        } elseif($i3->animalCode_id == $request->animalCode_id_m){
                            return view('mensajes.fichaReproduccionArtificial.externa'); 
                        }
                }
            }
        }*/
        //$re = new File_reproduction_artificial();
        $re->animalCode_id_m = $request->animalCode_id_m;  
        $re->date= $request->date;

        $re->artificial_id = $request->artificial_id;
        
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
                if($request->animalCode_id_m ==$i->id){
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
                if($request->animalCode_id_m ==$i->id){
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
                if($request->animalCode_id_m ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }


        $re->reproduction_state =$request->reproduction_state;
        $re->actual_state = $request->actual_state;
        $re->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();
        return redirect('/fichaReproduccionA');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproductionA.edit-reproductionA',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction_artificial::findOrFail($id);

        $animalhembra= DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->select('file_animale.id',
                            'file_animale.animalCode',
                            'file_animale.age_month',
                            'race.race_d as raza',
                            'file_animale.sex')
                    ->where('file_animale.actual_state','=','ACTIVO') 
                    ->where('file_animale.sex','=','HEMBRA')
                    

                ->get();

        $raza = DB::table('race')
                ->select('race.id',
                            'race.race_d',
                            'race.percentage',
                            'race.actual_state')
                            ->where('race.actual_state','=','ACTIVO')
                            ->get();

        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->join('race as f','file_animale.race_id','=','f.id')
                    ->Join('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m'
                            )
                    ->get(); 
        $arti= DB::table('artificial_Reproduction')
                    ->join('race','artificial_Reproduction.race_id','=','race.id')
                    ->select('artificial_Reproduction.id',
                    'race.race_d',
                    'artificial_Reproduction.reproduccion',
                    'artificial_Reproduction.supplier'
                    )
                    ->get();    

        return view('file_reproductionA.edit-reproductionA',compact('raza','animalhembra','arti','re'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $re =  File_reproduction_artificial::findOrFail($id);
        $id;

        
        $re =  File_reproduction_artificial::findOrFail($id);
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->artificial_id = $request->artificial_id;
        
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
                if($request->animalCode_id_m ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->gestation_state ="SI";
                    $animal_estado->update(); 
                }
            }
        }elseif ($estadoActualReproduccion == "FALLIDO") {
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id_m ==$i->id){
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
              
                if($request->animalCode_id_m ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }
        
        $re->reproduction_state =$request->reproduction_state;
        if($estadoActual == "INACTIVO"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'gestation_state',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
              
                if($request->animalCode_id_m ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->gestation_state ="NO";
                    $animal_estado->actual_state = "ACTIVO";
                    $animal_estado->update(); 
                }
            }
        }
        $re->actual_state = $request->actual_state;
        $re->save();

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();
        return redirect('/fichaReproduccionA');
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
