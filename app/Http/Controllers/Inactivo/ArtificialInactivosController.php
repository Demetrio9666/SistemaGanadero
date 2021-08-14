<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\Artificial_Reproduction;
use Spatie\Activitylog\Models\Activity;

class ArtificialInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arti= DB::table('artificial_reproduction')
                    ->join('race','race.id','=','artificial_reproduction.race_id')
                    ->select('artificial_reproduction.id',
                    'artificial_reproduction.date',
                    'race.race_d  as raza',
                    'artificial_reproduction.reproduccion',
                    'artificial_reproduction.supplier',
                    'artificial_reproduction.actual_state'
                    )->where('artificial_reproduction.actual_state','=','Inactivo')
                    ->get();

        //$arti = Artificial_Reproduction::all();

       //return $arti;
       return view('artificialR.index-inactivo',compact('arti'));
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
        return view('artificialR.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $razas = Race::all();
        
        $arti = Artificial_Reproduction::findOrFail($id);
   
        return view('artificialR.edit-inactivo', compact('arti','razas'));
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
        $arti = Artificial_Reproduction::findOrFail($id);
        $arti->actual_state = $request->actual_state;
        $arti->save(); 
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO INACTIVO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($arti->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$arti->reproduccion.'-'.$arti->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        return redirect('/inactivos/Materiales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $arti = Artificial_Reproduction::findOrFail($id);
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($arti->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$arti->reproduccion.'-'.$arti->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        $arti->delete();
        return redirect('/inactivos/Materiales')->with('eliminar','ok');
    }
}
