<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;

class AnimalesInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal = DB::table('file_animale')
        ->join('race','file_animale.race_id','=','race.id')
        ->join('location','file_animale.location_id','=','location.id')
        ->select('file_animale.id','file_animale.animalCode','file_animale.date','race.race_d as raza',
                'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                ,'file_animale.conceived')
                ->where('file_animale.actual_state', '=', 'Inactivo' )
        ->get();
        return view('file_animale.index-inactivo',compact('animal'));
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
        return view('file_animale.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza =Race::all();
        $ubicacion=Location::all();
        $animal = File_Animale::findOrFail($id);
        return view('file_animale.edit-inactivo', compact('animal','raza','ubicacion'));
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
        $animal->actual_state = $request->actual_state;
        $animal->save(); 
        return redirect('inactivos/fichaAnimales'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = File_Animale::findOrFail($id);
        $animal->delete();
        return redirect('inactivos/fichaAnimales')->with('eliminar','ok');
    }
}
