<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\File_partum;
use App\Models\Vitamin;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\File_partumInactivoExport;

class PartumInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $par = DB::table('file_partum')
        
        ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
        ->select('file_partum.id',
                 'file_partum.date',
                 'file_animale.animalCode as animal',
                 'file_partum.male',
                 'file_partum.female',
                 'file_partum.dead',
                 'file_partum.mother_status',
                 'file_partum.partum_type',
                 'file_partum.actual_state'
                )->where('file_partum.actual_state','=','INACTIVO')
                
                
        ->get();
        return view('file_partum.index-inactivo',compact('par'));
    }

    public function PDF(){
        $par = DB::table('file_partum')
        ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
        ->select('file_partum.id',
                'file_partum.date',
                'file_animale.animalCode as animal',
                'file_partum.male',
                'file_partum.female',
                'file_partum.dead',
                'file_partum.mother_status',
                'file_partum.partum_type',
                'file_partum.actual_state'
                )->where('file_partum.actual_state','=','INACTIVO')
                
        ->get();
        $pdf = PDF::loadView('file_partum.pdf-inactivo',compact('par'));

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
        $actvividad->view ='FICHA PARTO';
        $actvividad->data = 'FichasPartosInactivos.pdf';
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('FichasPartosInactivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='FICHA PARTO';
        $actvividad->data = 'FichasPartosInactivos.xlsx';
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();
        return Excel::download(new File_partumInactivoExport, 'FichasPartosInactivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('file_partum.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $par =  File_partum::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'gestation_state',
                     'actual_state'
                     
                  )
                  
                  ->where('actual_state','=','ACTIVO')->orwhere('actual_state','=','Reproduccion')
                  ->get();
        return view('file_partum.edit-inactivo',compact('animal','par'));
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
        $par =  File_partum::findOrFail($id);
        $par->actual_state = $request->actual_state;
        
        $par->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA PARTO INACTIVO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($par->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
       
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();

        return redirect('/fichaParto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $par =  File_partum::findOrFail($id);

        $par->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='FICHA PARTO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($par->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_partum');
    
        $actvividad->save();
       


        return redirect('/fichaParto')->with('eliminar','ok');
    }
}
