<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dewormer;
use Spatie\Activitylog\Models\Activity;

class DewormerInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desp = DB::table( 'dewormer')
            ->select('dewormer.id',
            'dewormer.dewormer_d',
            'dewormer.date_e',
            'dewormer.date_c',
            'dewormer.supplier',
            'dewormer.actual_state')
            ->where('dewormer.actual_state','=','INACTIVO')
            ->get();
        return view('dewormer.index-inactivo',compact('desp'));
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
        return view('dewormer.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desp = Dewormer::findOrFail($id);
        return view('dewormer.edit-inactivo', compact('desp'));
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
        $desp = Dewormer::findOrFail($id);
        $desp->actual_state = $request->actual_state;
        $desp->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO DESPARASITANTE INACTIVO';
        $actvividad->data = $request->dewormer_d;
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();
        return redirect('inactivos/Desparasitantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desp = Dewormer::findOrFail($id);
        $desp->delete();
        return redirect('inactivos/Desparasitantes')->with('eliminar','ok');
    }
}
