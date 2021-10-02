<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\LocationInactivoExport;

class LocationInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacion = DB::table('location')
                    ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','INACTIVO')
                    ->get();
        return view('location.index-inactivo',compact('ubicacion'));
    }

    public function PDF(){
        $ubicacion = DB::table('location')
                    ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','INACTIVO')
                    ->get();
        $pdf = PDF::loadView('location.pdf-inactivo',compact('ubicacion'));

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
        $actvividad->view ='REGISTRO UBICACION';
        $actvividad->data = 'RegistrosLocalizacionesInactivos.pdf';
        $actvividad->subject_type =('App\Models\Location');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosLocalizacionesInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO UBICACION';
        $actvividad->data = 'RegistrosLocalizacionesInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Location');
        
        $actvividad->save();
        
        return Excel::download(new LocationInactivoExport, 'RegistrosLocalizacionesInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


    public function show($id)
    {
        return view('location.edit-inactivo',compact('id'));
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
        return view('location.edit-inactivo', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $ubicacion = Location::findOrFail($id);
        $ubicacion->delete();
        
        $ubicacion->actual_state =$request->actual_state;
        $ubicacion->save(); 
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO UBICACION INACTIVO';


        $actvividad->data = $ubicacion->location_d.'-'.$ubicacion->description;
        $actvividad->subject_type =('App\Models\Location');
        
        $actvividad->save();
        return redirect('/inactivos/Ubicaciones'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $ubicacion = Location::findOrFail($id);
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO UBICACION';


        $actvividad->data = $ubicacion->location_d.'-'.$ubicacion->description;
        $actvividad->subject_type =('App\Models\Location');
        
        $actvividad->save();
        
        return redirect('/inactivos/Ubicaciones')->with('eliminar','ok'); 
    }
}
