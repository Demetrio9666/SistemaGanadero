<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Race;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\RaceInactivoExport;

class RaceInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = DB::table('race')
        ->select('race.id',
        'race.race_d',
        'race.percentage',
        'race.actual_state')
        ->where('race.actual_state','=','INACTIVO')
        ->get();
        return view('race.index-inactivo',compact('raza'));
    }

    public function PDF(){
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','INACTIVO')
                    ->get();
        $pdf = PDF::loadView('race.pdf-inactivo',compact('raza'));

        $actvividad = new  Activity();
        $user = Auth::user()->name;
        $id = Auth::user()->id;
        $rol = Auth::user()->roles->pluck('rol');
        $correo = Auth::user()->email;
        $actvividad->log_name = $user;
        $actvividad->email = $correo;

        $super= str_replace('"','',$rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = 'RegistrosRazasInactivos.pdf';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('RegistrosRazasInactivos-'.date('Y-m-d H:i:s').'.pdf');
        
    }

    public function Excel(){
        $actvividad = new  Activity();
        $user = Auth::user()->name;
        $id = Auth::user()->id;
        $rol = Auth::user()->roles->pluck('rol');
        $correo = Auth::user()->email;
        $actvividad->log_name = $user;
        $actvividad->email = $correo;

        $super= str_replace('"','',$rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = 'RegistrosRazasInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();

        return Excel::download(new RaceInactivoExport, 'RegistrosRazasInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('race.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza = Race::findOrFail($id);
        return view('race.edit-inactivo', compact('raza'));
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
        $raza = Race::findOrFail($id);
        $raza->actual_state =$request->actual_state;
        $raza->save();
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO RAZA INACTIVO';

        $actvividad->data = $raza->race_d.'-'.$raza->percentage.'%';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        return redirect('inactivos/Razas'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $raza = Race::findOrFail($id);
        $raza->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = $raza->race_d.'-'.$raza->percentage.'%';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        
        
        return redirect('inactivos/Razas')->with('eliminar','ok'); 
    }
}
