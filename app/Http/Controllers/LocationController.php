<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\StoreLocation;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocationExport;

class LocationController extends Controller
{
    public function __construct(){
        $this->middleware('can:confUbicacion.index')->only('index');
        $this->middleware('can:confUbicacion.create')->only('create','store');
        $this->middleware('can:confUbicacion.edit')->only('show','edit','update');
        $this->middleware('can:confUbicacion.destroy')->only('delete');
    }

    public function index()
    {
        $ubicacion = DB::table('location')
                    ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','Disponible')
                    ->get();
        return view('location.index-location',compact('ubicacion'));
    }
    public function PDF(){
        $ubicacion = DB::table('location')
                    ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','Disponible')
                    ->get();
        $pdf = PDF::loadView('location.pdf',compact('ubicacion'));
        return $pdf->setPaper('a4','landscape')->download('RegistroLocalizaciones.pdf');
    }
    public function Excel(){
        return Excel::download(new LocationExport, 'RegistroLocalizaciones.xlsx');
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
        
    }
}
