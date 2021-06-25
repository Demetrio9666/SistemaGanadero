<?php

namespace App\Http\Controllers;
use App\Models\Race;

use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = Race::all();
        return view('race.index-race',compact('raza'));
        //return $raza;
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
    public function store(Request $request)
    {
        $raza = new Race();
        
        $raza->description = $request->description;
        $raza->percentage = $request->percentage;
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
    public function update(Request $request, $id)
    {
        $raza = Race::findOrFail($id);
        $raza->description = $request->description;
        $raza->percentage = $request->percentage;
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
        $raza = Race::findOrFail($id);
        $raza->delete();
        return redirect('/confRaza')->with('eliminar','ok'); 
    }
}