<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vitamin;
use App\Models\File_animale;
use App\Models\Antibiotic;
use App\Models\File_treatment;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\File_treatmentInactivoExport;

class TreatmentInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.recovery',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','INACTIVO')    
                
        ->get();

      return view('file_treatment.index-inactivo',compact('tra'));
    }

  
    public function PDF(){
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.recovery',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','INACTIVO')    
                
        ->get();
        $pdf = PDF::loadView('file_treatment.pdf-inactivo',compact('tra'));

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
        $actvividad->view ='FICHA TRATAMIENTO';
        $actvividad->data = 'FichasTratamientosInactivos.pdf';
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichasTratamientosInactivos-'.date('Y-m-d H:i:s').'.pdf');
    }
    public function Excel() {
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
        $actvividad->view ='FICHA TRATAMIENTO';
        $actvividad->data = 'FichasTratamientosInactivos.xlsx';
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return Excel::download(new File_treatmentInactivoExport, 'FichasTratamientosInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('file_treatment.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tra = File_treatment::findOrFail($id);
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','Disponible')
       ->get();
       
        $vitamina = DB::table('vitamin')
                    ->select('vitamin.id',
                    'vitamin.vitamin_d',
                    'vitamin.actual_state')
                    ->where('vitamin.actual_state','=','Disponible')
        ->get();

        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'actual_state'
                  )
                  ->where('actual_state','=','Disponible')->Orwhere('actual_state','=','Reproduccion')
                  ->where('health_condition','=','Enfermo')
        ->get();
        return view('file_treatment.edit-inactivo',compact('vitamina','animalT','anti','tra'));  
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
        $tra = File_treatment::findOrFail($id);
        $tra->actual_state = $request->actual_state;
        
        $tra->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA TRATAMIENTO INACTIVO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($tra->animalCode_id == $i->id){
                    $animal_Code= $i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        return redirect('inactivos/fichaTratamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $tra = File_treatment::findOrFail($id);
        $tra->delete();
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='FICHA TRATAMIENTO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($tra->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
            }
        }
        
        $actvividad->data = $animal_Code;
        $actvividad->subject_type =('App\Models\File_treatment');
    
        $actvividad->save();

        
        return redirect('inactivos/fichaTratamientos')->with('eliminar','ok');
    }
}
