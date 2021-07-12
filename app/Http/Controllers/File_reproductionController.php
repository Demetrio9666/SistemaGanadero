<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction;
use App\Models\Artificial_Reproduction;
use App\Models\External_mount;
use App\Models\Internal_mount;

class File_reproductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $re_A = DB::table('file_reproduction')
             ->join('file_animale','file_reproduction.animalCode_id_m','=','file_animale.id')
             ->join('artificial_reproduction','file_reproduction.artificial_id','=','artificial_reproduction.id')
             ->join('race as f','file_animale.race_id','=','f.id')
             ->Join('race as a','artificial_reproduction.race_id','=','a.id')
             ->select('file_reproduction.id',
                     'file_reproduction.date_r as fecha_A',
                     'file_animale.animalCode as animalA',
                     'f.race_d as raza_h',  
                     'artificial_reproduction.reproduccion as tipo', 
                     'a.race_d as raza_m'
                     )
                     ->whereNotNull('file_reproduction.artificial_id')
             ->get(); 
       // dd($re_A);

       $re_MI = DB::table('file_reproduction')
              ->join('file_animale as M','file_reproduction.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction.id',
                       'file_reproduction.date_r as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m'
                    

                      )
                      ->whereNotNull('file_reproduction.animalCode_id_p')
                      
              ->get();

              

        
        
        return view('file_reproduction.index-reproduction',compact('re_A','re_MI'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $re_A = DB::table('file_reproduction')
             ->join('file_animale','file_reproduction.animalCode_id_m','=','file_animale.id')
             ->join('artificial_reproduction','file_reproduction.artificial_id','=','artificial_reproduction.id')
             ->join('race as f','file_animale.race_id','=','f.id')
             ->Join('race as a','artificial_reproduction.race_id','=','a.id')
             ->select('file_reproduction.id',
                     'file_reproduction.date_r as fecha_A',
                     'file_animale.animalCode as animalA',
                     'f.race_d as raza_h',  
                     'artificial_reproduction.reproduccion as tipo', 
                     'a.race_d as raza_m'
                     )
                     ->whereNotNull('file_reproduction.artificial_id')
             ->get();
        $raza =Race::all();

        $animalR= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->where('file_animale.age_month','>=',24)
                ->where('file_animale.stage','=','Vaca')->orWhere('file_animale.stage','=','Toro')
                ->get();


        $interna= DB::table('internal_mount')
        ->join('file_animale','internal_mount.animalCode_id','=','file_animale.id')
        ->join('race','file_animale.race_id','=','race.id')
        ->select('internal_mount.id',
                'file_animale.animalCode',
                'race.race_d',
                'file_animale.age_month' )
        ->get();

       $arti= DB::table('artificial_Reproduction')
       ->join('race','artificial_Reproduction.race_id','=','race.id')
       ->select('artificial_Reproduction.id',
       'race.race_d',
       'artificial_Reproduction.reproduccion',
       'artificial_Reproduction.supplier'
       )
       ->get();



       

        return view('file_reproduction.create-reproduction',compact('raza','animalR','interna','arti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $re = new File_reproduction();
        $re->date_r= $request->date_r;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->artificial_id = $request->artificial_id;
        $re->save(); 
        return redirect('/fichaReproduccion');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproduction.edit-reproduction',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction::findOrFail($id);
        
        $re_A = DB::table('file_reproduction')
        ->join('file_animale','file_reproduction.animalCode_id_m','=','file_animale.id')
        ->join('artificial_reproduction','file_reproduction.artificial_id','=','artificial_reproduction.id')
        ->join('race as f','file_animale.race_id','=','f.id')
        ->Join('race as a','artificial_reproduction.race_id','=','a.id')
        ->select('file_reproduction.id',
                'file_reproduction.date_r as fecha_A',
                'file_animale.animalCode as animalA',
                'f.race_d as raza_h',  
                'artificial_reproduction.reproduccion as tipo', 
                'a.race_d as raza_m'
                )
                ->whereNotNull('file_reproduction.artificial_id')
        ->get();
         $raza =Race::all();

        $animalR= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->where('file_animale.age_month','>=',24)
                ->where('file_animale.stage','=','Vaca')->orWhere('file_animale.stage','=','Toro')
                ->get();


        $interna= DB::table('internal_mount')
        ->join('file_animale','internal_mount.animalCode_id','=','file_animale.id')
        ->join('race','file_animale.race_id','=','race.id')
        ->select('internal_mount.id',
                'file_animale.animalCode',
                'race.race_d',
                'file_animale.age_month' )
        ->get();

        $arti= DB::table('artificial_Reproduction')
        ->join('race','artificial_Reproduction.race_id','=','race.id')
        ->select('artificial_Reproduction.id',
        'race.race_d',
        'artificial_Reproduction.reproduccion',
        'artificial_Reproduction.supplier'
        )
        ->get();

        return view('file_reproduction.edit-reproduction',compact('raza','animalR','interna','arti','re'));
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
        $re =  File_reproduction::findOrFail($id);
        
        
        $re->date_r= $request->date_r;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->artificial_id = $request->artificial_id;
        $re->save(); 
        return redirect('/fichaReproduccion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
