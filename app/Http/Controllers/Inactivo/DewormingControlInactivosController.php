<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Dewormer;
use App\Models\Deworming_control;

class DewormingControlInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desC = DB::table('deworming_control')
        ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
        ->join('dewormer','deworming_control.deworming_id','=','dewormer.id')
        ->select('deworming_control.id',
                 'deworming_control.date',
                 'file_animale.animalCode as animal',
                 'dewormer.dewormer_d as des',
                 'deworming_control.date_r',
                 'deworming_control.actual_state')
                 ->where('deworming_control.actual_state','=','Inactivo')
        ->get();
     return view('dewormerC.index-inactivo',compact('desC'));
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
        return view('dewormerC.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $des =  Dewormer::all();
        $desC = Deworming_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  
        ->get();

        return view('dewormerC.edit-inactivo', compact('desC','des','animal'));
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
        $desC = Deworming_control::findOrFail($id);
        $desC->actual_state = $request->actual_state;
      
        $desC->save(); 
        return redirect('inactivos/controlDesparasitaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desC = Deworming_control::findOrFail($id);
        $desC->delete();
        return redirect('inactivos/controlDesparasitaciones')->with('eliminar','ok'); 
    }
}
