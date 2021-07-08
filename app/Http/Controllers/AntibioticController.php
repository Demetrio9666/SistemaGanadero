<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antibiotic;

class AntibioticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anti = Antibiotic::all();
        return view('antibiotic.index-antibiotic',compact('anti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antibiotic.create-antibiotic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anti = new Antibiotic();
        $anti->antibiotic_d = $request->antibiotic_d;
        $anti->date_e = $request->date_e;
        $anti->date_c = $request->date_c;
        $anti->supplier = $request->supplier;
        $anti->save(); 
    
        //return redirect()->route();
        return redirect('/confAnt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('antibiotic.edit-antibiotic',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anti = Antibiotic::findOrFail($id);
        return view('antibiotic.edit-antibiotic', compact('anti'));
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
        $desp = Antibiotic::findOrFail($id);
        $desp->antibiotic_d = $request->antibiotic_d;
        $desp->date_e = $request->date_e;
        $desp->date_c = $request->date_c;
        $desp->supplier = $request->supplier;
        $desp->save(); 
        return redirect('/confAnt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desp = Antibiotic::findOrFail($id);
        $desp->delete();
        return redirect('/confAnt')->with('eliminar','ok');
    }
}
