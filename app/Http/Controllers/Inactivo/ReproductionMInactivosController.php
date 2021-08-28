<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_internal;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\File_reproduction_internalInactivoExport;

class ReproductionMInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.actual_state'
                      )->where('file_reproduction_internal.actual_state','=','INACTIVO')
                      
              ->get();

        return view('file_reproductionM.index-inactivo',compact('re_MI'));
    }

    public function PDF(){
        $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.actual_state'
                      )->where('file_reproduction_internal.actual_state','=','INACTIVO')
                      
              ->get();
              $pdf = PDF::loadView('file_reproductionM.pdf',compact('re_MI'));

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
                $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA';
                $actvividad->data = 'FichaReproduccionesMontasNaturalesInternasActivos.pdf';
                $actvividad->subject_type =('App\Models\File_reproduction_internal');
            
                $actvividad->save();
              return $pdf->setPaper('a4','landscape')->download('FichaReproduccionesMontasNaturalesInternasActivos-'.date('Y-m-d H:i:s').'.pdf');
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
                $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA';
                $actvividad->data = 'FichaReproduccionesMontasNaturalesInternasActivos.xlsx';
                $actvividad->subject_type =('App\Models\File_reproduction_internal');
            
                $actvividad->save();

        return Excel::download(new File_reproduction_internalInactivoExport, 'FichaReproduccionesMontasNaturalesInternasActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('file_reproductionM.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        $animalRM= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->Where('file_animale.stage','=','Toro')
                ->get();
        $animalRH= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->where('file_animale.stage','=','Vaca')
                ->get();

        return view('file_reproductionM.edit-inactivo',compact('raza','animalRM','animalRH','re'));
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
        $re =  File_reproduction_internal::findOrFail($id);
        $re->actual_state = $request->actual_state;
        
        $re->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA INACTIVO';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_internal');
    
        $actvividad->save();
        return redirect('inactivos/fichaReproduccionM');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $re =  File_reproduction_internal::findOrFail($id);

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA ';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($re->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_internal');
    
        $actvividad->save();
        $re->delete();
        return redirect('inactivos/fichaReproduccionEx')->with('eliminar','ok'); 
    }
}
