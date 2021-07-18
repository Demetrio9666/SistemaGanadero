<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\StoreLocation;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacion = Location::all();
        return view('location.index-location',compact('ubicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create-location');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocation $request)
    {
        $ubicacion = new Location();
        
        $ubicacion->location_d = $request->location_d;
        $ubicacion->description = $request->description;
        $ubicacion->actual_state =$request->actual_state;
        $ubicacion->save(); 
        
        //return redirect()->route();
        return redirect('/confUbicacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('location.edit-location',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = location::findOrFail($id);
        return view('location.edit-location', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocation $request, $id)
    {
        $ubicacion = Location::findOrFail($id);
        $ubicacion->location_d = $request->location_d;
        $ubicacion->description = $request->description;
        $ubicacion->actual_state =$request->actual_state;
        $ubicacion->save(); 
        return redirect('/confUbicacion'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicacion = Location::findOrFail($id);
        $ubicacion->delete();
        return redirect('/confUbicacion')->with('eliminar','ok'); 
    }
}
