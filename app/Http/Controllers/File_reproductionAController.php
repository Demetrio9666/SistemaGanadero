<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction;
use App\Models\Artificial_Reproduction;



class File_reproductionAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza =Race::all();
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
   
   return view('file_reproductionA.index-reproductionA',compact('re_A'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $raza =Race::all();
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
        $arti= DB::table('artificial_Reproduction')
        ->join('race','artificial_Reproduction.race_id','=','race.id')
        ->select('artificial_Reproduction.id',
        'race.race_d',
        'artificial_Reproduction.reproduccion',
        'artificial_Reproduction.supplier'
        )
        ->get();   
        return view('file_reproductionA.create-reproductionA',compact('raza','arti','animalR'));
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
        $re =  File_reproduction::findOrFail($id);
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
        $raza =Race::all();
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
        $arti= DB::table('artificial_Reproduction')
        ->join('race','artificial_Reproduction.race_id','=','race.id')
        ->select('artificial_Reproduction.id',
        'race.race_d',
        'artificial_Reproduction.reproduccion',
        'artificial_Reproduction.supplier'
        )
        ->get();   

        return view('file_reproductionA.edit-reproductionA',compact('raza','animalR','arti','re'));
        
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
        $re =  File_reproduction::findOrFail($id);
        $re->delete();
        return redirect('/fichaReproduccionA')->with('eliminar','ok'); 
    }
}
