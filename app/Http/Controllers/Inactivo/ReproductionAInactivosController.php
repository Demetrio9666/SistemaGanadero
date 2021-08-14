<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
use App\Models\Artificial_Reproduction;
use Spatie\Activitylog\Models\Activity;

class ReproductionAInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = DB::table('race')
                ->select('race.id',
                'race.race_d',
                'race.percentage',
                'race.actual_state')
                ->where('race.actual_state','=','Disponible')
        ->get();
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
                        ->where('file_reproduction_artificial.actual_state','=','Inactivo')
                        
        ->get(); 
// dd($re_A);

return view('file_reproductionA.index-inactivo',compact('re_A'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproductionA.edit-inactivo',compact('id'));
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
            
                ->where('file_animale.stage','=','Vaca')
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

        return view('file_reproductionA.edit-inactivo',compact('raza','animalRH','arti','re'));
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
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL INACTIVO';

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
        return redirect('inactivos/fichaReproduccionA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $re =  File_reproduction_artificial::findOrFail($id);

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL ';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($re->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();

        $re->delete();
        return redirect('/fichaReproduccionA')->with('eliminar','ok'); 
    }
}
