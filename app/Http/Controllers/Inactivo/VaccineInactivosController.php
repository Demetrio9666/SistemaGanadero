<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vaccine;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\VaccineInactivoExport;

class VaccineInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacuna = DB::table('vaccine')
        ->select('id',
                    'vaccine_d',
                    'date_e',
                    'date_c',
                    'supplier',
                    'actual_state')
                    ->Where('actual_state','=','INACTIVO')
        ->get();
        
        return view('vaccine.index-inactivo',compact('vacuna'));
    }

    public function PDF(){
        $vacuna = DB::table('vaccine')
        ->select('id',
                    'vaccine_d',
                    'date_e',
                    'date_c',
                    'supplier',
                    'actual_state')
                    ->Where('actual_state','=','INACTIVO')
        ->get();
        $pdf = PDF::loadView('vaccine.pdf-inactivo',compact('vacuna'));

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
        $actvividad->view ='REGISTRO VACUNA';
        $actvividad->data = 'RegistrosVacunasInactivos.pdf';
        $actvividad->subject_type =('App\Models\Vaccine');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosVacunasInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO VACUNA';
        $actvividad->data = 'RegistrosVacunasInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Vaccine');
        
        $actvividad->save();

        return Excel::download(new VaccineInactivoExport,'RegistrosVacunasInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('vaccine.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacuna = Vaccine::findOrFail($id);
        return view('vaccine.edit-inactivo', compact('vacuna'));
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
        $vacuna = Vaccine::findOrFail($id);
        $vacuna->actual_state = $request->actual_state;
        $vacuna->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO VACUNA INACTIVO';
        $actvividad->data = $vacuna->vaccine_d;
        $actvividad->subject_type =('App\Models\Vaccine');
        

        $actvividad->save();
        return redirect('inactivos/Vacunas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $vacuna = Vaccine::findOrFail($id);
        $vacuna->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO VACUNA';
        $actvividad->data = $vacuna->vaccine_d;
        $actvividad->subject_type =('App\Models\Vaccine');
        
        $actvividad->save();
        
        return redirect('inactivos/Vacunas')->with('eliminar','ok'); 
    }
}
