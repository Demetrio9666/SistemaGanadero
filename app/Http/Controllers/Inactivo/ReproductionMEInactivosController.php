<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\File_reproduction_external;
use App\Models\File_animale;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\File_reproduction_externalInactivoExport;

class ReproductionMEInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        $ext =  DB::table('file_reproduction_external')
                ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
                ->join('race as R','file_animale.race_id','=','R.id')
                ->join('race','file_reproduction_external.race_id','=','race.id')
                ->select('file_reproduction_external.id',
                            'file_reproduction_external.date',
                            'file_animale.animalCode',
                            'R.race_d as raza',
                            'file_animale.age_month as edad',
                            'file_animale.sex as sexo',
                            'file_reproduction_external.animalCode_Exte',
                            'race.race_d',
                            'file_reproduction_external.age_month',
                            'file_reproduction_external.sex',
                            'file_reproduction_external.hacienda_name',
                            'file_reproduction_external.reproduction_state',
                            'file_reproduction_external.actual_state')
                            ->where('file_reproduction_external.actual_state','=','INACTIVO')
                ->get();

        return view('file_reproductionME.index-inactivo',compact('raza','ext'));
    }

    public function PDF(){
        $ext =  DB::table('file_reproduction_external')
        ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
        ->leftJoin('race as R','file_animale.race_id','=','R.id')
        ->leftJoin('race','file_reproduction_external.race_id','=','race.id')
        ->select('file_reproduction_external.id',
                    'file_reproduction_external.date',
                    'file_animale.animalCode',
                    'R.race_d as raza',
                    'file_animale.age_month as edad',
                    'file_animale.sex as sexo',
                    'file_reproduction_external.animalCode_Exte',
                    'race.race_d',
                    'file_reproduction_external.age_month',
                    'file_reproduction_external.sex',
                    'file_reproduction_external.hacienda_name',
                    'file_reproduction_external.reproduction_state',
                    'file_reproduction_external.actual_state')
                    ->where('file_reproduction_external.actual_state','=','INACTIVO')
                    
        ->get();
        $pdf = PDF::loadView('file_reproductionME.pdf-inactivo',compact('ext'));

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
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';
        $actvividad->data = 'FichasReproduccionesMontasNaturalesExternasInactios.pdf';
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichasReproduccionesMontasNaturalesExternasInactios-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA ';
        $actvividad->data = 'FichasReproduccionesMontasNaturalesExternasInactios.xlsx';
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return Excel::download(new File_reproduction_externalInactivoExport, 'FichasReproduccionesMontasNaturalesExternasInactios'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('file_reproductionME.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ext =  File_reproduction_external::findOrFail($id);
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        $animaleEX= DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->select('file_animale.id',
                            'file_animale.animalCode',
                            'file_animale.age_month',
                            'race.race_d as raza',
                            'file_animale.sex')
                    ->where('file_animale.actual_state','=','REPRODUCCIÓN')
                    ->where('file_animale.stage','=','VACA')->orwhere('file_animale.stage','=','VACONA')
                    
                ->get();
        
        $raza = Race::all();
        return view('file_reproductionME.edit-inactivo',compact('ext','raza','animaleEX'));
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
        $ext =  File_reproduction_external::findOrFail($id);
        $extt =  DB::table('file_reproduction_external')
        ->select('id',
                'date',
                'animalCode_id',
                'actual_state'
                )
                ->where('actual_state','=','DISPONIBLE')
                    
        ->get();
       //return $ext; 
        $re_A = DB::table('file_reproduction_artificial')
        ->select('id',
                'date',
                'animalCode_id_m',
                'actual_state'
                )
                ->where('actual_state','=','DISPONIBLE')
                
                ->get(); 
       // return $re_A;

        $re_MI = DB::table('file_reproduction_internal')
                ->select('id',
                        'date',
                        'animalCode_id_m',
                        'actual_state'
                        )->where('actual_state','=','DISPONIBLE')
                        
                ->get();
                //return $re_MI;
       
        foreach($re_A as $i3){
            foreach($re_MI as $i2){
                foreach( $extt as $i){
                        if($i->animalCode_id == $request->animalCode_id ){
                            //return view('mensajes.fichaReproduccionExterna.externa');
                            break;
                        }elseif($i2->animalCode_id_m == $request->animalCode_id){
                            return view('mensajes.fichaReproduccionExterna.montaInterna'); 
                        } elseif($i3->animalCode_id_m == $request->animalCode_id){
                            return view('mensajes.fichaReproduccionExterna.artificial'); 
                        }         


                }
            }
        }
        $ext->actual_state = $request->actual_state;
        $estadoActual = $request->actual_state;
        if($estadoActual == "DISPONIBLE"){
            $animalB  = DB::table('file_animale')
            ->select(   'id',
                        'animalCode',
                        'actual_state'  
                    )->get();
            foreach($animalB as $i){
                if($request->animalCode_id_m ==$i->id){
                    $id_b=$i->id;
                    $animal_estado = File_Animale::findOrFail($id_b);
                    $animal_estado->actual_state = "DISPONIBLE";
                    $animal_estado->update(); 
                }
            }
        }
        
        $ext->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA INACTIVO ';

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
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();

        return redirect('inactivos/fichaReproduccionEx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        $ext =  File_reproduction_external::findOrFail($id);
        $ext->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL EXTERNA';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($ext->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_external');
    
        $actvividad->save();


        
        return redirect('inactivos/fichaReproduccionEx')->with('eliminar','ok');
    }
}
