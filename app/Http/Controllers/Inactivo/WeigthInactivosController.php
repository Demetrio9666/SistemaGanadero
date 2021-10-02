<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Weigth_control;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\Weigth_controlInactivoExport;

class WeigthInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesoC = DB::table('weigth_control')
                    ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                    ->select('weigth_control.id',
                    'weigth_control.date',
                    'file_animale.animalCode as animal',
                    'weigth_control.weigtht',
                    'weigth_control.date_r',
                    'weigth_control.actual_state')
                    ->where('weigth_control.actual_state','=','INACTIVO')
                    ->get();
        return view('weigthC.index-inactivo',compact('pesoC'));
    }

    public function PDF(){
        $pesoC = DB::table('weigth_control')
                ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                ->select('weigth_control.id'
                ,'weigth_control.date',
                'file_animale.animalCode as animal',
                'weigth_control.weigtht',
                'weigth_control.date_r',
                'weigth_control.actual_state')
                ->where('weigth_control.actual_state','=','INACTIVO')
                ->get();
        $pdf = PDF::loadView('weigthC.pdf-inactivo',compact('pesoC'));

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
        $actvividad->view ='CONTROL PESO';
        $actvividad->data = 'ControlesPesosInactivos.pdf';
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('ControlesPesosInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='CONTROL PESO';
        $actvividad->data ='ControlesPesosInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
        return Excel::download(new Weigth_controlInactivoExport, 'ControlesPesosInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('weigthC.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('weigthC.edit-inactivo', compact('pesoC','animal'));
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
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC-> actual_state = $request-> actual_state;
        $pesoC->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL PESO INACTIVO';

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
        
        
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
        return redirect('inactivos/controlPesos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='CONTROL PESO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($pesoC->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\Weigth_control');
    
        $actvividad->save();
        
        return redirect('/controlPeso')->with('eliminar','ok'); 
    }
}
