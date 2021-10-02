<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Dewormer;
use App\Models\Deworming_control;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\Deworming_controlInactivoExport;

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
        ->leftJoin('dewormer','deworming_control.deworming_id','=','dewormer.id')
        ->select('deworming_control.id',
                 'deworming_control.date',
                 'file_animale.animalCode as animal',
                 'dewormer.dewormer_d as des',
                 'deworming_control.date_r',
                 'deworming_control.actual_state')
                 ->where('deworming_control.actual_state','=','INACTIVO')
        ->get();
     return view('dewormerC.index-inactivo',compact('desC'));
    }

    public function PDF(){
        $desC = DB::table('deworming_control')
                ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
                ->leftJoin('dewormer','deworming_control.deworming_id','=','dewormer.id')
                ->select('deworming_control.id',
                         'deworming_control.date',
                         'file_animale.animalCode as animal',
                         'dewormer.dewormer_d as des',
                         'deworming_control.date_r',
                         'deworming_control.actual_state')
                         ->where('deworming_control.actual_state','=','INACTIVO')
                ->get();
                $pdf = PDF::loadView('dewormerC.pdf-inactivo',compact('desC'));

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
                $actvividad->data = 'ControlesDesparacitacionesInactivos.PDF';
                $actvividad->view ='CONTROL DESPARASITACION';

                $actvividad->subject_type =('App\Models\Deworming_control');
            
                $actvividad->save();
                return $pdf->setPaper('a4','landscape')->download('ControlesDesparacitacionesInactivos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->data = 'ControlesDesparacitacionesInactivos.xlsx';
        $actvividad->view ='CONTROL DESPARASITACION';

        $actvividad->subject_type =('App\Models\Deworming_control');
    
        $actvividad->save();
        return Excel::download(new Deworming_controlInactivoExport, 'ControlesDesparacitacionesInactivos'.date('Y-m-d H:i:s').'.xlsx');
    }

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

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;
 
        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);
 
        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL DESPARASITACION INACTIVO';
 
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\Deworming_control');
    
        $actvividad->save();
        return redirect('inactivos/controlDesparasitaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $desC = Deworming_control::findOrFail($id);
        $desC->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;
 
        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);
 
        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='CONTROL DESPARASITACION';
 
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
        
        
        $actvividad->subject_type =('App\Models\Deworming_control');
    
        $actvividad->save();
        
        return redirect('inactivos/controlDesparasitaciones')->with('eliminar','ok'); 
    }
}
