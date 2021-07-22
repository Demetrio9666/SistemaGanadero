<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;
use App\Http\Requests\StoreVaccineC;

class Vaccine_controlController extends Controller
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
                        )->where('vaccine_control.actual_state','=','disponible')
                ->get();
                
         return view('vaccineC.index-vaccineC',compact('vacunaC'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacuna = DB::table('vaccine')
        ->select('id','vaccine_d')
        ->where('actual_state','=','Disponible')
        ->get();

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('vaccineC.create-vaccineC',compact('animal','vacuna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccineC $request)
    {
        $vacunaC = new Vaccine_control();
       

        $vacunaC->date = $request->date;
        $vacunaC->animalCode_id = $request->animalCode_id;
        $vacunaC->vaccine_id = $request->vaccine_id;
        $vacunaC->date_r = $request->date_r;
        $vacunaC->actual_state = $request->actual_state;
        
        $vacunaC->save(); 
        
        //return redirect()->route();
        return redirect('/controlVacuna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vaccineC.edit-vaccineC',compact('id'));
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
        return view('vaccineC.edit-vaccineC', compact('vacunaC','vacuna','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVaccineC $request, $id)
    {
        $vacunaC = Vaccine_control::findOrFail($id);

        $vacunaC->date = $request->date;
        $vacunaC->animalCode_id = $request->animalCode_id;
        $vacunaC->vaccine_id = $request->vaccine_id;
        $vacunaC->date_r = $request->date_r;
        $vacunaC->actual_state = $request->actual_state;
        $vacunaC->save(); 
        return redirect('/controlVacuna');
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
        return redirect('/controlVacuna')->with('eliminar','ok'); 
    }
}
