<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Antibiotic;

class AntibioticInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$anti = Antibiotic::all();
        $anti = DB::table('antibiotic')
                ->select('antibiotic.id',
                          'antibiotic.antibiotic_d',
                          'antibiotic.date_e',
                          'antibiotic.date_c',
                          'antibiotic.supplier',
                          'antibiotic.actual_state')
                          ->where('antibiotic.actual_state','=','Inactivo')
            ->get();

        return view('antibiotic.index-inactivo',compact('anti'));
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
        return view('antibiotic.edit-inactivo',compact('id'));
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
        return view('antibiotic.edit-inactivo', compact('anti'));
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
        $anti = Antibiotic::findOrFail($id);
        $anti->actual_state = $request->actual_state;
        $anti->save(); 
        return redirect('inactivos/Antibioticos');
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
        return redirect('inactivos/Antibioticos')->with('eliminar','ok');
    }
}
