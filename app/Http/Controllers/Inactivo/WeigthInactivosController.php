<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Weigth_control;

class WeigthInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesoC = DB::table('weigth_control')
                    ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                    ->select('weigth_control.id',
                    'weigth_control.date',
                    'file_animale.animalCode as animal',
                    'weigth_control.weigtht',
                    'weigth_control.date_r',
                    'weigth_control.actual_state')
                    ->where('weigth_control.actual_state','=','Inactivo')
                    ->get();
        return view('weigthC.index-inactivo',compact('pesoC'));
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
        return view('weigthC.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('weigthC.edit-inactivo', compact('pesoC','animal'));
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
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC-> actual_state = $request-> actual_state;
        $pesoC->save(); 
        return redirect('inactivos/controlPesos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC->delete();
        return redirect('/controlPeso')->with('eliminar','ok'); 
    }
}