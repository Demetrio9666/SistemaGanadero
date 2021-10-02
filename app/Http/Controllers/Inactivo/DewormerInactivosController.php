<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dewormer;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\DewormerInactivoExport;

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

    public function PDF(){
        $desp = DB::table('dewormer')
        ->select('dewormer.id',
                'dewormer.dewormer_d',
                'dewormer.date_e',
                'dewormer.date_c',
                'dewormer.supplier',
                'dewormer.actual_state')
                ->where('dewormer.actual_state','=','INACTIVO')
        ->get();
        $pdf = PDF::loadView('dewormer.pdf-inactivo',compact('desp'));

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
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data ='RegistrosDesparasitantesInactivos.pdf';
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosDesparasitantesInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data ='RegistrosDesparasitantesInactivo.pdf';
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();

        return Excel::download(new DewormerInactivoExport, 'RegistrosDesparasitantesInactivo'.date('Y-m-d H:i:s').'.xlsx');
    }

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
    public function destroy($id , Request $request)
    {
        $desp = Dewormer::findOrFail($id);
        $desp->delete();

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;
 
        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);
 
        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO DESPARASITANTE INACTIVO';
 
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($desC->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\Dewormer');
    
        $actvividad->save();

        return redirect('inactivos/Desparasitantes')->with('eliminar','ok');
    }
}
