<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Http\Requests\StoreVitamin;

class VitaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vitamina= DB::table('vitamin')
        ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
        ->where('actual_state','=','Disponible')
        ->get();
        
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
    public function store(StoreVitamin $request)
    {
        $vitamina = new Vitamin();
        
        $vitamina->vitamin_d = $request->vitamin_d;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->actual_state = $request->actual_state;
        
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
    public function update(StoreVitamin $request, $id)
    {
        $vitamina = Vitamin::findOrFail($id);
        $vitamina->vitamin_d = $request->vitamin_d;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->actual_state = $request->actual_state;
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
        
    }
}
