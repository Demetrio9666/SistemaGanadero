<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRace;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RaceExport;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        return view('race.index-race',compact('raza'));
        
    }
    public function PDF(){
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        $pdf = PDF::loadView('race.pdf',compact('raza'));
        return $pdf->setPaper('a4','landscape')->download('RegistroRazas.pdf');
        
    }

    public function Excel(){
        return Excel::download(new RaceExport, 'RegistroRazas.xlsx');
    }

















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('race.create-race');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRace  $request)
    {
        $raza = new Race();
        
        $raza->race_d = $request->race_d;
        $raza->percentage = $request->percentage;
        $raza->actual_state =$request->actual_state;
        $raza->save(); 
        
        //return redirect()->route();
        return redirect('/confRaza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('race.edit-race',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza = Race::findOrFail($id);
        return view('race.edit-race', compact('raza'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRace  $request, $id)
    {
        $raza = Race::findOrFail($id);
        $raza->race_d = $request->race_d;
        $raza->percentage = $request->percentage;
        $raza->actual_state =$request->actual_state;
        $raza->save();
        return redirect('/confRaza'); 
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
