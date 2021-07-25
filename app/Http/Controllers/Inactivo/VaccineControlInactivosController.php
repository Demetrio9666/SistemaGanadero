<?php

namespace App\Http\Controllers\Inactivo;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;


class VaccineControlInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunaC= DB::table('vaccine_control')
        ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
        ->join('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
        ->select('vaccine_control.id'
                ,'vaccine_control.date'
                ,'vaccine.vaccine_d as vacuna'
                ,'file_animale.animalCode as animal',
                'vaccine_control.date_r',
                'vaccine_control.actual_state'
                )->where('vaccine_control.actual_state','=','INACTIVO')
        ->get();
    
        return view('vaccineC.index-inactivo',compact('vacunaC'));
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
        return view('vaccineC.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacuna = DB::table('vaccine')
        ->select('id','vaccine_d')
        ->where('actual_state','=','Disponible')
        ->get();
        $vacunaC = Vaccine_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('vaccineC.edit-inactivo', compact('vacunaC','vacuna','animal'));
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
        $vacunaC = Vaccine_control::findOrFail($id);
        $vacunaC->actual_state = $request->actual_state;
        $vacunaC->save(); 
        return redirect('inactivos/controlVacunas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacunaC = Vaccine_control::findOrFail($id);
        $vacunaC->delete();
        return redirect('inactivos/controlVacunas')->with('eliminar','ok'); 
    }
}
