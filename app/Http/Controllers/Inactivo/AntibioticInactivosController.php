<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Antibiotic;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\AntibioticosInactivoExport;

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
                          ->where('antibiotic.actual_state','=','INACTIVO')
            ->get();

        return view('antibiotic.index-inactivo',compact('anti'));
    }

    public function PDF(){
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','INACTIVO')
       ->get();
       $pdf = PDF::loadView('antibiotic.pdf-inactivo',compact('anti'));
       
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
       $actvividad->view ='REGISTRO ANTIBIOTICO';
       $actvividad->data = 'RegistrosAntibioticosInactivos.pdf';
       $actvividad->subject_type =('App\Models\Antibiotic');
       
       $actvividad->save();

       return $pdf->setPaper('a4','landscape')->download('RegistrosAntibioticosInactivos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->view ='REGISTRO ANTIBIOTICO';
        $actvividad->data = 'RegistrosAntibioticosInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
        return Excel::download(new AntibioticosInactivoExport,'RegistrosAntibioticosInactivos-'.date('Y-m-d H:i:s').'.xlsx');

    }

  
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
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO ANTIBIOTICO INACTIVO';
        $actvividad->data = $anti->antibiotic_d;
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
        return redirect('inactivos/Antibioticos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request )
    {
        $anti = Antibiotic::findOrFail($id);
        $anti->delete();
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO ANTIBIOTICO';
        $actvividad->data = $anti->antibiotic_d;
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
        
        return redirect('inactivos/Antibioticos')->with('eliminar','ok');
    }
}
