<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\External_mount;
use App\Models\File_animale;
class External_mountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $raza = Race::all();
        $ext =  DB::table('external_mount')
        ->join('file_animale','external_mount.animalCode_id','=','file_animale.id')
        ->join('race as R','file_animale.race_id','=','R.id')
        ->join('race','external_mount.race_id','=','race.id')
        ->select('external_mount.id',
                    'external_mount.date_r',
                    'file_animale.animalCode',
                    'R.race_d as raza',
                    'file_animale.age_month as edad',
                    'file_animale.sex as sexo',

                    'external_mount.animalCode_Exte',
                    'race.race_d',
                    'external_mount.age_month',
                    'external_mount.sex',
                    'external_mount.hacienda_name')
        ->get();

        return view('external_M.index-external_M',compact('raza','ext'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raza = Race::all();
        $animalR= DB::table('file_animale')
        ->join('race','file_animale.race_id','=','race.id')
        ->select('file_animale.id',
        'file_animale.animalCode',
        'file_animale.age_month',
        'race.race_d',
        'file_animale.sex')
        ->where('file_animale.age_month','>=',24)
        
        ->get();
        
        return view('external_M.create-external_M',compact('raza','animalR'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ext = new External_mount();
       
        $ext->date_r= $request->date_r;
        $ext->animalCode_id = $request->animalCode_id;
        $ext->animalCode_Exte = $request->animalCode_Exte;
        $ext->race_id = $request->race_id;
        $ext->age_month = $request->age_month;
        $ext->sex = $request->sex;
        $ext->hacienda_name = $request->hacienda_name;
        
        $ext->save(); 

        return redirect('/fichaReproduccionEx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('external_M.edit-external_M',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animalR= DB::table('file_animale')
        ->join('race','file_animale.race_id','=','race.id')
        ->select('file_animale.id',
        'file_animale.animalCode',
        'file_animale.age_month',
        'race.race_d',
        'file_animale.sex')
        ->where('file_animale.age_month','>=',24)
        
        ->get();
        $ext =  External_mount::findOrFail($id);
        $raza = Race::all();
        return view('external_M..edit-external_M',compact('ext','raza','animalR'));
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
        $ext =  External_mount::findOrFail($id);

        $ext->date_r= $request->date_r;
        $ext->animalCode_id = $request->animalCode_id;
        $ext->animalCode_Exte = $request->animalCode_Exte;
        $ext->race_id = $request->race_id;
        $ext->age_month = $request->age_month;
        $ext->sex = $request->sex;
        $ext->hacienda_name = $request->hacienda_name;
        
        $ext->save(); 

        return redirect('/fichaReproduccionEx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 

    public function destroy($id)
    {
        $ext =  External_mount::findOrFail($id);
        $ext->delete();
        return redirect('/fichaReproduccionEx')->with('eliminar','ok');

    }
}
