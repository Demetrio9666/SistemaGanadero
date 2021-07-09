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
             ->join('file_animale','file_reproduction.animalCode_id','=','file_animale.id')
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
              ->join('file_animale as hembra','file_reproduction.animalCode_id','=','hembra.id')
              ->join('internal_mount','file_reproduction.internal_mount_id','=','internal_mount.id')

              ->join('race as f','hembra.race_id','=','f.id')

              ->join('file_animale as macho','internal_mount.animalCode_id','=','macho.id')

              ->join('race as m','macho.race_id','=','m.id')

              ->select('file_reproduction.id',
                       'file_reproduction.date_r as fecha_MI',
                       'hembra.animalCode as animal_h_MI',
                       'f.race_d as raza_h_MI',
                       'hembra.age_month as edad_h_MI',

                       'macho.animalCode as animal_m_MI',
                       'm.race_d as raza_m_MI',
                       'macho.age_month as edad_m_MI'

                      )
                      ->whereNotNull('file_reproduction.internal_mount_id')
              ->get();

              

              $re_ME = DB::table('file_reproduction')
              ->join('file_animale as hembra_e','file_reproduction.animalCode_id','=','hembra_e.id')
              ->join('external_mount','file_reproduction.external_mount_id','=','external_mount.id')

              ->join('race as f_e','hembra_e.race_id','=','f_e.id')

              ->join('race as m_e','external_mount.race_id','=','m_e.id')
              ->select('file_reproduction.id',
                        'file_reproduction.date_r as fecha_ME',
                        'hembra_e.animalCode as animal_h_ME',
                        'f_e.race_d as raza_h_ME',
                        'hembra_e.age_month as edad_h_ME',
                        'external_mount.animalCode_Exte',
                        'm_e.race_d as raza_m_ME',
                        'external_mount.hacienda_name')
                        ->whereNotNull('file_reproduction.external_mount_id')

             ->get();

        
              
             
        
        return view('file_reproduction.index-reproduction',compact('re_A','re_MI','re_ME'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
