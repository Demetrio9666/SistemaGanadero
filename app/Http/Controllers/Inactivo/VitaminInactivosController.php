<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vitamin;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\VitaminInactivoExport;

class VitaminInactivosController extends Controller
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
                    ->where('actual_state','=','INACTIVO')
                    ->get();
        
        return view('vitamin.index-inactivo',compact('vitamina'));
    }

    public function PDF(){
        $vitamina= DB::table('vitamin')
                    ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
                    ->where('actual_state','=','INACTIVO')
                    ->get(); 
        $pdf = PDF::loadView('vitamin.pdf-inactivo',compact('vitamina'));

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
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = 'RegistrosVitaminasInactivos.pdf';
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosVitaminasInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = 'RegistrosVitaminasInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();

        return Excel::download(new VitaminInactivoExport,'RegistrosVitaminasInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('vitamin.edit-inactivo',compact('id'));
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
        return view('vitamin.edit-inactivo', compact('vitamina'));
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
        $vitamina->actual_state = $request->actual_state;
        $vitamina->save(); 
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO VITAMINA INACTIVO';
        $actvividad->data = $vitamina->vitamin_d;
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();
        return redirect('inactivos/Vitaminas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $vitamina = Vitamin::findOrFail($id);
        $vitamina->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = $vitamina->vitamin_d;
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();
        
        return redirect('inactivos/Vitaminas')->with('eliminar','ok');
    }
}
