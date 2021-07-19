<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Http\Requests\StoreFile_animale;
use App\Http\Requests\EditFile_animale;
class File_animaleController extends Controller
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
                            ->where('file_animale.actual_state', '=', 'Disponible' )->Orwhere('file_animale.actual_state', '=', 'Reproduccion')
                    ->get();
        return view('file_animale.index-animale',compact('animal'));
        //return $animal;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $raza =Race::all();
        $ubicacion=Location::all();
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
        
        //return redirect()->route();
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
        $raza =Race::all();
        $ubicacion=Location::all();
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
        $animal->save(); 
      
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
