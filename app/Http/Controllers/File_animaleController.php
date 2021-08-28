<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Models\User;
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
                            ->where('file_animale.actual_state','=','DISPONIBLE')
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
                            ->where('file_animale.actual_state','=','DISPONIBLE' )
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
                    ->where('race.actual_state','=','Disponible')
                    ->get();

         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','Disponible')
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
        
        $animal->animalCode = $request->codigo_animal;

        //$imagen = $request->file('file')->store('public/imagenes');
        //$url = Storage::url($imagen);
        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagenes/' .$nombre;

        Image::make($request->file('file'))
              ->resize(182 ,190 ,function($constraint){
                $constraint->aspectRatio();
        })
        ->save($ruta);

        $animal->url = '/storage/imagenes/'.$nombre;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;
        $animal->actual_state = $request->actual_state;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;
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
                    ->where('race.actual_state','=','DISPONIBLE')
                    ->get();
         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','DISPONIBLE')
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
    public function update(Request $request, $id)
    {
       
        $animal = File_Animale::findOrFail($id);

        $animal->animalCode = $request->codigo_animal;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;
        $animal->actual_state = $request->actual_state;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;

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
