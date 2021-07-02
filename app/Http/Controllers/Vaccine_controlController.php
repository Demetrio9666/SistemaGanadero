<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;

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
                    ->join('file_animale','file_animale.id','=' ,'vaccine_control.animalCode_id')
                    ->join('vaccine','vaccine_id','=','vaccine_control.vaccine_id')
                    ->select('vaccine_control.id','vaccine_control.date_vaccine','file_animale.animalCode as animal','vaccine.vaccine as vacuna','vaccine_control.date_vr')
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
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date_n',
                     'age_month',
                     'sex'
                  )
                  
        ->get();


        $vacuna = Vaccine::all();
        return view('vaccineC.create-vaccineC',compact('animal','vacuna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacuna = new Vaccine();
        
        $vacuna->vaccine = $request->vaccine;
        $vacuna->date_e = $request->date_e;
        $vacuna->date_c = $request->date_c;
        $vacuna->supplier = $request->supplier;
        $vacuna->save(); 
        
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
        $vacuna = Vaccine::findOrFail($id);
        return view('vaccineC.edit-vaccineC', compact('vacuna'));
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
        $vacuna = Vaccine::findOrFail($id);

        $vacuna->vaccine = $request->vaccine;
        $vacuna->date_e = $request->date_e;
        $vacuna->date_c = $request->date_c;
        $vacuna->supplier = $request->supplier;
        $vacuna->save(); 
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
        $vacuna = Vaccine::findOrFail($id);
        $vacuna->delete();
        return redirect('/controlVacuna')->with('eliminar','ok'); 
    }
}
