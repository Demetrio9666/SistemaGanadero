<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Models\User;
use App\Models\File_reproduction_artificial;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_external;
use App\Http\Requests\StoreFile_animale;
use App\Http\Requests\EditFile_animale;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_AnimalesExport;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;


class File_animaleController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaAnimal.index')->only('index');
        $this->middleware('can:fichaAnimal.create')->only('create','store');
        $this->middleware('can:fichaAnimal.edit')->only('show','edit','update');
        $this->middleware('can:fichaAnimal.destroy')->only('delete');
    }
    public function index()
    {
        $animal = DB::table('file_animale')
                    ->leftJoin('race','file_animale.race_id','=','race.id')
                    ->leftJoin('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.url','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                            ->where('file_animale.actual_state','=','ACTIVO')
                            ->orwhere('file_animale.actual_state','=','REPRODUCCIÓN')
                            ->orwhere('file_animale.actual_state','=','VENDIDO')
                            
                            
                    ->get();
        return view('file_animale.index-animale',compact('animal'));
        //return $animal;

    }

    public function PDF(Request $request){
                    $animal = DB::table('file_animale')
                    ->leftJoin('race','file_animale.race_id','=','race.id')
                    ->leftJoin('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                            ->where('file_animale.actual_state','=','ACTIVO' )
                            ->Orwhere('file_animale.actual_state','=','REPRODUCCIÓN')
                            ->Orwhere('file_animale.actual_state','=','VENDIDO')
                    ->get();
                
        $pdf = PDF::loadView('file_animale.pdf',compact('animal'));

        //return $pdf->download('codingdriver.pdf');
       
       ///segunda forma de enviar el rol 
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
       $actvividad->view ='FICHA ANIMAL';
       $actvividad->data ='FichasAnimalesActivos.pdf';
       $actvividad->subject_type =('App\Models\File_Animale');
       $actvividad->save();
   
       return $pdf->setPaper('a4','landscape')->download('FichasAnimalesActivos-'.date('Y-m-d H:i:s').'.pdf');
       //return $pdf->setPaper('a4','landscape')->stream('FichasAnimalesActivos-'.date('Y-m-d H:i:s').'.pdf');
    }

    
    public function Excel() 
    {
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
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data ='FichasAnimalesActivos.xlsx';
        $actvividad->subject_type =('App\Models\File_Animale');
        $actvividad->save();

        return Excel::download(new File_AnimalesExport, 'FichasAnimalesActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','ACTIVO')
                    ->get();

         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','ACTIVO')
                    ->get();

        return view('file_animale.create-animale',compact('raza','ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_animale $request)
    {

        $animal = new File_Animale();
        $animal1 = DB::table('file_animale')
        ->leftJoin('race','file_animale.race_id','=','race.id')
        ->leftJoin('location','file_animale.location_id','=','location.id')
        ->select('file_animale.id','file_animale.animalCode','file_animale.url','file_animale.date','race.race_d as raza',
                'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                ,'file_animale.conceived')
                ->where('file_animale.actual_state','=','ACTIVO')
                ->orwhere('file_animale.actual_state','=','REPRODUCCIÓN')
                ->orwhere('file_animale.actual_state','=','VENDIDO')
                ->get();
                    
                    foreach($animal as $i2){
                    if($request->sexo == 'HEMBRA'){
                        if($request->etapa =='TERNERO' || $request->etapa =='TORETE' || $request->etapa =='TORO' ){
                            return view('mensajes.fichaAnimal.generoH'); 
                        }else{
                            if($request->etapa =='TERNERA' )  {
                                if(($request->edad < 0 || $request->edad >10)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                                    return view('mensajes.fichaAnimal.ternera'); 
                                }
                            
                            }elseif ($request->etapa =='VACONILLA' ) {
                                if(($request->edad < 11 || $request->edad >22) || $request->actual_state =='REPRODUCCIÓN' || $request->estado_de_gestacion =='SI'){
                                    return view('mensajes.fichaAnimal.vaconilla'); 
                                }
                            }elseif ($request->etapa =='VACONA' ) {
                                if($request->edad < 23 || $request->edad >36 ){
                                    return view('mensajes.fichaAnimal.vacona'); 
                                }
                            }elseif ($request->etapa =='VACA') {
                                if($request->edad < 37 || $request->edad >600 ){
                                    return view('mensajes.fichaAnimal.vaca'); 
                                }
                            }else{
                                break;
                            }
                        }
                        
                    }elseif($request->sexo == 'MACHO'){
                        if($request->etapa =='TERNERA' || $request->etapa =='VACONILLA' || $request->etapa =='VACONA' || $request->etapa =='VACA'){
                            return view('mensajes.fichaAnimal.generoM'); 
                        }else{
                            if($request->etapa =='TERNERO'){
                                if(($request->edad < 0 || $request->edad >3)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                                    return view('mensajes.fichaAnimal.ternero'); 
                                }
                            }elseif ($request->etapa =='TORETE') {
                                if(($request->edad < 4 || $request->edad >20)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                                    return view('mensajes.fichaAnimal.torete'); 
                                }
                            }elseif ($request->etapa =='TORO') {
                                if(($request->edad < 21 || $request->edad >600) ||  $request->estado_de_gestacion == 'SI' ){
                                    return view('mensajes.fichaAnimal.toro'); 
                                }
                            }else{
                                break;
                            }

                        }
                    }else{
                        break;
                    }

                    }
       
        
        $animal->animalCode = $request->codigo_animal;

        //$imagen = $request->file('file')->store('public/imagenes');
        //$url = Storage::url($imagen);
        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        //ruta donde se guarda 
        $ruta = storage_path() . '\app\public\imagenes/' .$nombre;

        //comprimir
        Image::make($request->file('file'))
              ->resize(182 ,190 ,function($constraint){
                $constraint->aspectRatio();
        })
        ->save($ruta);
        // guardo la ruta del acceso creado
        $animal->url = '/storage/imagenes/'.$nombre;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;

      
            

        $animal->actual_state = $request->actual_state;
        $animal->save(); 
       
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data =$animal->animalCode;
        $actvividad->subject_type =('App\Models\File_Animale');
    
        $actvividad->save();
      
        return redirect('/fichaAnimal')->with('Validad','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('file_animale.edit-animale',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','ACTIVO')
                    ->get();
         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','ACTIVO')
                    ->get();
        $animal = File_Animale::findOrFail($id);
      
        return view('file_animale.edit-animale', compact('animal','raza','ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFile_animale $request, $id)
    {
        $this->validate(request(), [
            'codigo_animal' => ['required','unique:file_animale,animalCode,'.$id]
            //'file'=> ['required','unique:file_animale,file,'.$id]
            
            
        ]);

        $animal = File_Animale::findOrFail($id);
        $id;
        $re_A = DB::table('file_reproduction_artificial')
        ->select('id',
                'date',
                'animalCode_id_m',
                'actual_state'
                )
                ->where('actual_state','=','ACTIVO')
                
        ->get(); 
//return $re_A;

        $re_MI = DB::table('file_reproduction_internal')
                ->select('id',
                        'date',
                        'animalCode_id_m',
                        'actual_state'
                        )->where('actual_state','=','ACTIVO')
                        
                ->get();
                //return $re_MI;
        $ext =  DB::table('file_reproduction_external')
                ->select('id',
                        'date',
                        'animalCode_id',
                        'actual_state')
                        ->where('actual_state','=','ACTIVO')
                            
                ->get();

        $animal1 = DB::table('file_animale')
                    ->leftJoin('race','file_animale.race_id','=','race.id')
                    ->leftJoin('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.url','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                            ->where('file_animale.actual_state','=','ACTIVO')
                            ->orwhere('file_animale.actual_state','=','REPRODUCCIÓN')
                            ->orwhere('file_animale.actual_state','=','VENDIDO')
                            
                            
                    ->get();
        foreach($animal1 as $i){
            if($i->id == $id){
                $sexo =$i->sex ;
                $etapa=$i->stage;
                $edad=$i->age_month ;
                $embarazo=$i->gestation_state ;
                $estado=$i->actual_state ;
            }
        }
        foreach($animal as $i2){
            if($request->sexo == 'HEMBRA'){
                if($request->etapa =='TERNERO' || $request->etapa =='TORETE' || $request->etapa =='TORO' ){
                    return view('mensajes.fichaAnimal.generoH'); 
                }else{
                    if($request->etapa =='TERNERA' )  {
                        if(($request->edad < 0 || $request->edad >10)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                            return view('mensajes.fichaAnimal.ternera'); 
                        }
                      
                    }elseif ($request->etapa =='VACONILLA' ) {
                        if(($request->edad < 11 || $request->edad >22) || $request->actual_state =='REPRODUCCIÓN' || $request->estado_de_gestacion =='SI'){
                            return view('mensajes.fichaAnimal.vaconilla'); 
                        }
                    }elseif ($request->etapa =='VACONA' ) {
                        if($request->edad < 23 || $request->edad >36 ){
                            return view('mensajes.fichaAnimal.vacona'); 
                        }
                    }elseif ($request->etapa =='VACA') {
                        if($request->edad < 37 || $request->edad >600 ){
                            return view('mensajes.fichaAnimal.vaca'); 
                        }
                    }else{
                        break;
                    }
                }
                
            }elseif($request->sexo == 'MACHO'){
                if($request->etapa =='TERNERA' || $request->etapa =='VACONILLA' || $request->etapa =='VACONA' || $request->etapa =='VACA'){
                    return view('mensajes.fichaAnimal.generoM'); 
                }else{
                    if($request->etapa =='TERNERO'){
                        if(($request->edad < 0 || $request->edad >3)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                            return view('mensajes.fichaAnimal.ternero'); 
                        }
                    }elseif ($request->etapa =='TORETE') {
                        if(($request->edad < 4 || $request->edad >20)  || $request->actual_state =='REPRODUCCIÓN' ||  $request->estado_de_gestacion == 'SI' ){
                            return view('mensajes.fichaAnimal.torete'); 
                        }
                    }elseif ($request->etapa =='TORO') {
                        if(($request->edad < 21 || $request->edad >600) ||  $request->estado_de_gestacion == 'SI' ){
                            return view('mensajes.fichaAnimal.toro'); 
                        }
                    }else{
                        break;
                    }

                }
                   
            
            }else{
                break;
            }

         
         
        }
       
        $animal->animalCode = $request->codigo_animal;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;

        if($request->actual_state == "REPRODUCCIÓN"){
            $codigoAnimal=$id;
            foreach($ext as $i3){
                foreach($re_MI as $i){
                    foreach($re_A as $i2){
                        if( $i2->animalCode_id_m == $codigoAnimal){
                            return view('mensajes.fichaReproduccionArtificial.artificial'); 
                        }elseif ($i->animalCode_id_m == $codigoAnimal) {
                            return view('mensajes.fichaReproduccionArtificial.montaInterna');
                        }elseif($i3->animalCode_id == $codigoAnimal){
                            return view('mensajes.fichaReproduccionArtificial.externa');
                        }
                    }
                }
            }
                   
        }elseif ($request->actual_state == "VENDIDO") {
            $codigoAnimal=$id;
            foreach($ext as $i3){
                foreach($re_MI as $i){
                    foreach($re_A as $i2){
                        if( $i2->animalCode_id_m == $codigoAnimal){
                            return view('mensajes.fichaReproduccionArtificial.artificial'); 
                        }elseif ($i->animalCode_id_m == $codigoAnimal) {
                            return view('mensajes.fichaReproduccionArtificial.montaInterna');
                        }elseif($i3->animalCode_id == $codigoAnimal){
                            return view('mensajes.fichaReproduccionArtificial.externa');
                        }
                    }
                }
            }
        }



        $animal->actual_state = $request->actual_state;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;
        
        //si exite 
        if($request->hasFile('file')){
            $destino = $animal->url;
            //storage/imagenes/o6OjntwgUcpexels-lucas-allmann-4
            $url_replazo = str_replace('storage','public',$destino);
              //public/imagenes/o6OjntwgUcpexels-lucas-allmann-4
               Storage::delete( $url_replazo);
                $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

                $ruta = storage_path() . '\app\public\imagenes/' .$nombre ;
        
                Image::make($request->file('file'))
                      ->resize(182 ,190 ,function($constraint){
                        $constraint->aspectRatio();
                })
                ->save($ruta);
               
                $animal->url = '/storage/imagenes/'.$nombre;
                $animal->update();
          
        }


       
    
        $animal->update(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data =$animal->animalCode;
        $actvividad->subject_type =('App\Models\File_Animale');
    
        $actvividad->save();
      
      return redirect('/fichaAnimal'); 
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
