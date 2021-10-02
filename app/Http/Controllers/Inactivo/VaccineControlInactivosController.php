<?php

namespace App\Http\Controllers\Inactivo;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\Vaccine_controlInactivoExport;

class VaccineControlInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunaC= DB::table('vaccine_control')
        ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
        ->leftJoin('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
        ->select('vaccine_control.id'
                ,'vaccine_control.date'
                ,'vaccine.vaccine_d as vacuna'
                ,'file_animale.animalCode as animal',
                'vaccine_control.date_r',
                'vaccine_control.actual_state'
                )->where('vaccine_control.actual_state','=','INACTIVO')
        ->get();
    
        return view('vaccineC.index-inactivo',compact('vacunaC'));
    }

    public function PDF(){
        $vacunaC= DB::table('vaccine_control')
                    ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
                    ->leftJoin('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
                    ->select('vaccine_control.id'
                            ,'vaccine_control.date'
                            ,'vaccine.vaccine_d as vacuna'
                            ,'file_animale.animalCode as animal',
                            'vaccine_control.date_r',
                            'vaccine_control.actual_state'
                            )->where('vaccine_control.actual_state','=','INACTIVO')
                    ->get();
        $pdf = PDF::loadView('vaccineC.pdf-inactivo',compact('vacunaC'));

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
        $actvividad->view ='CONTROL VACUNACION';
        $actvividad->data = 'ControlesVacunasInactivo.pdf';
   
        
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('ControlesVacunasInactivo-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='CONTROL VACUNACION';
        $actvividad->data = 'ControlesVacunasInactivo.xlsx';
   
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();

        return Excel::download(new Vaccine_controlInactivoExport, 'ControlesVacunasInactivo-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('vaccineC.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacuna = DB::table('vaccine')
        ->select('id','vaccine_d')
        ->where('actual_state','=','Disponible')
        ->get();
        $vacunaC = Vaccine_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('vaccineC.edit-inactivo', compact('vacunaC','vacuna','animal'));
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
        $vacunaC = Vaccine_control::findOrFail($id);
        $vacunaC->actual_state = $request->actual_state;
        $vacunaC->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL VACUNACION INACTIVO';

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
        
        
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();

        return redirect('inactivos/controlVacunas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $vacunaC = Vaccine_control::findOrFail($id);
        $vacunaC->delete();
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='CONTROL VACUNACION INACTIVO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($vacunaC->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\Vaccine_control');
    
        $actvividad->save();
        
        return redirect('inactivos/controlVacunas')->with('eliminar','ok'); 
    }
}
