<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacuna = Vaccine::all();
        return view('vaccine.index-vaccine',compact('vacuna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('vaccine.create-vaccine');
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
        return redirect('/confVacuna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vaccine.edit-vaccine',compact('id'));
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
        return view('vaccine.edit-vaccine', compact('vacuna'));
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
        return redirect('/confVacuna');
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
        return redirect('/confVacuna')->with('eliminar','ok'); 
    }
}
