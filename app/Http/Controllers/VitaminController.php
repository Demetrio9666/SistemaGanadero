<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitamin;

class VitaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vitamina = Vitamin::all();
        return view('vitamin.index-vitamin',compact('vitamina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vitamin.create-vitamin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vitamina = new Vitamin();
        
        $vitamina->vitamin = $request->vitamin;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->save(); 
             //return redirect()->route();
        return redirect('/confVi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vitamin.edit-vitamin',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamina = Vitamin::findOrFail($id);
        return view('vitamin.edit-vitamin', compact('vitamina'));
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
        $vitamina = Vitamin::findOrFail($id);
        $vitamina->vitamin = $request->vitamin;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->save(); 
        return redirect('/confVi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitamina = Vitamin::findOrFail($id);
        $vitamina->delete();
        return redirect('/confVi')->with('eliminar','ok');
    }
}
