<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Pregnancy_control;
use App\Models\Vitamin;



class Pregnancy_controlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pre = DB::table('pregnancy_control')
             ->join('vitamin','pregnancy_control.vitamin_id','=','vitamin.id')
             ->join('file_animale','pregnancy_control.animalCode_id','=','file_animale.id')
             ->select('pregnancy_control.id','pregnancy_control.date','file_animale.animalCode as animal','vitamin.vitamin_d as vitamina',
                        'pregnancy_control.alternative1 as alt1','pregnancy_control.alternative2  as alt2','pregnancy_control.observation',
                        'pregnancy_control.date_rc')
             ->get();     
        return view('PregnancyC.index-PregnancyC',compact('pre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vitamina= Vitamin::all();
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  ->where('sex','Hembra')
                  ->where('age_month','>=',24)
                  ->where('actual_state','=','Disponible')
                  ->where('stage','=','Vaca')
                  
        ->get();
        return view('PregnancyC.create-PregnancyC',compact('vitamina','animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pre = new Pregnancy_control();
       
        $pre->date = $request->date;
        $pre->animalCode_id = $request->animalCode_id;
        $pre->vitamin_id = $request->vitamin_id;
        $pre->alternative1 = $request->alternative1;
        $pre->alternative2 = $request->alternative2;
        $pre->observation = $request->observation;
        $pre->date_rc = $request->date_rc;
        $pre->save(); 

        return redirect('/controlPrenes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pregnancyC.edit-pregnancyC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamina= Vitamin::all();
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  ->where('sex','Hembra')
                  ->where('age_month','>=',24)
        ->get();
        $pre = Pregnancy_control::findOrFail($id);
        return view('pregnancyC.edit-pregnancyC', compact('pre','vitamina','animal'));

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
        $pre = Pregnancy_control::findOrFail($id);
        $pre->date = $request->date;
        $pre->animalCode_id = $request->animalCode_id;
        $pre->vitamin_id = $request->vitamin_id;
        $pre->alternative1 = $request->alternative1;
        $pre->alternative2 = $request->alternative2;
        $pre->observation = $request->observation;
        $pre->date_rc = $request->date_rc;
        $pre->save(); 
        return redirect('/controlPrenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pre = Pregnancy_control::findOrFail($id);
        $pre->delete();
        return redirect('/controlPrenes')->with('eliminar','ok');
    }
}
