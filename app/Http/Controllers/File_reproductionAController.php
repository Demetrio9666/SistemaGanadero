<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
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
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','DISPONIBLE')
                            
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
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','DISPONIBLE')
                            
                    ->get(); 
        $pdf = PDF::loadView('file_reproductionA.pdf',compact('re_A'));
        $actvividad = new  Activity();
        $user = Auth::user()->name;
        $id = Auth::user()->id;
        $rol = Auth::user()->roles->pluck('name');
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

        return $pdf->setPaper('a4','landscape')->download('FichaReproduccionArtificial.pdf');

    }
    public function Excel(){
        return Excel::download(new File_reproduction_artificialExport, 'FichaReproduccionArtificial.xlsx');
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
                        )->where('actual_state','=','DISPONIBLE')
                ->get();

        
       /* $animalRH= DB::table('file_animale')
                        ->join('race','file_animale.race_id','=','race.id')
                        ->select('file_animale.id',
                        'file_animale.animalCode',
                        'file_animale.age_month',
                        'race.race_d',
                        'file_animale.sex')
                        ->where(function($query){
                                            $query = DB::table('file_reproduction_artificial')
                                            ->select(
                                                    'animalCode_id_m',
                                                    )->where('file_animale.animalCode','!=','file_reproduction_artificial.animalCode_id_m')
                                                     //->where('file_reproduction_artificial.actual_state','=','DISPONIBLE');
                                            -
            
                          })
                        //->where('file_animale.actual_state','=','REPRODUCCIÓN')
                        //->where('file_animale.stage','=','VACA','AND','file_animale.gestation_state','=','NO')
                       ->get();*/



                      

                       $animalRH= DB::table('file_animale')
                                    ->join('race','file_animale.race_id','=','race.id')
                                    ->select('file_animale.id',
                                    'file_animale.animalCode',
                                    'file_animale.age_month',
                                    'race.race_d',
                                    'file_animale.sex')
                                    //->where('file_animale.animalCode','!=')
                                        /*->where(function($query){
                                                            $query->select( 'animalCode_id_m')
                                                            ->from('file_reproduction_artificial')
                                                            ->where('file_animale.animalCode','!=','file_reproduction_artificial.animalCode_id_m')
                                                            ->get();
                                                            //->where('file_reproduction_artificial.actual_state','=','DISPONIBLE');
                                            })*/
                          ->where('file_animale.actual_state','=','REPRODUCCIÓN')
                          ->where('file_animale.stage','=','VACA','AND','file_animale.gestation_state','=','NO')
                      ->get();

        

        $raza = DB::table('race')
                        ->select('race.id',
                        'race.race_d',
                        'race.percentage',
                        'race.actual_state')
                        ->where('race.actual_state','=','DISPONIBLE')
                ->get();


      


        $arti= DB::table('artificial_Reproduction')
                        ->join('race','artificial_Reproduction.race_id','=','race.id')
                        ->select('artificial_Reproduction.id',
                        'race.race_d',
                        'artificial_Reproduction.reproduccion',
                        'artificial_Reproduction.supplier'
                        )->where('artificial_Reproduction.actual_state','=','DISPONIBLE')
        ->get();  

       
        return view('file_reproductionA.create-reproductionA',compact('raza','animalRH','arti'));
       //return $animalRH;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_reproductionA $request)
    {
        $re = new File_reproduction_artificial();
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->artificial_id = $request->artificial_id;
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

        $animalRH= DB::table('file_animale')
                        ->join('race','file_animale.race_id','=','race.id')
                        ->select('file_animale.id',
                        'file_animale.animalCode',
                        'file_animale.age_month',
                        'race.race_d',
                        'file_animale.sex')
                        ->where('file_animale.actual_state','=','REPRODUCCIÓN')
                        ->where('file_animale.stage','=','VACA','AND','file_animale.gestation_state','=','NO')
                        
     
                ->get();
        $raza =Race::all();

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

        return view('file_reproductionA.edit-reproductionA',compact('raza','animalRH','arti','re'));
        
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
        
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->artificial_id = $request->artificial_id;
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
