<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_internal;
use App\Http\Requests\StoreFile_reproductionM;

class File_reproductionMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.actual_state'
                    

                      )
                      
              ->get();

              

        
        
        return view('file_reproductionM.index-reproduction',compact('re_MI'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raza =Race::all();
        $animalRM= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->Where('file_animale.stage','=','Toro')
                ->get();
        $animalRH= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->where('file_animale.stage','=','Vaca')
                ->get();


        return view('file_reproductionM.create-reproduction',compact('raza','animalRM','animalRH'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_reproductionM $request)
    {
        $re = new File_reproduction_internal();
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->actual_state = $request->actual_state;
        $re->save(); 
        return redirect('/fichaReproduccionM');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproductionM.edit-reproduction',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        $raza =Race::all();
        $animalRM= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->Where('file_animale.stage','=','Toro')
                ->get();
        $animalRH= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->where('file_animale.stage','=','Vaca')
                ->get();

        return view('file_reproductionM.edit-reproduction',compact('raza','animalRM','animalRH','re'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_reproductionM $request, $id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        
        
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->actual_state = $request->actual_state;
        
        $re->save(); 
        return redirect('/fichaReproduccionM');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        $re->delete();
        return redirect('/fichaReproduccionM')->with('eliminar','ok'); 
    }
}
