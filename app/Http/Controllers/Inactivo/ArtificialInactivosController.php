<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\Artificial_Reproduction;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\ArtificialReproductionInactivoExport;

class ArtificialInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arti= DB::table('artificial_reproduction')
                    ->join('race','race.id','=','artificial_reproduction.race_id')
                    ->select('artificial_reproduction.id',
                    'artificial_reproduction.date',
                    'race.race_d  as raza',
                    'artificial_reproduction.reproduccion',
                    'artificial_reproduction.supplier',
                    'artificial_reproduction.actual_state'
                    )->where('artificial_reproduction.actual_state','=','Inactivo')
                    ->get();

        //$arti = Artificial_Reproduction::all();

       //return $arti;
       return view('artificialR.index-inactivo',compact('arti'));
    }

    public function PDF(){
        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->leftJoin('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->leftJoin('race as f','file_animale.race_id','=','f.id')
                    ->leftJoin('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','INACTIVO')
                            
                    ->get(); 
        $pdf = PDF::loadView('file_reproductionA.pdf-inactivo',compact('re_A'));
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
 
        $actvividad->rol =$super3;
        $actvividad->subject_id =$id;
        $actvividad->description =('DESCARGA');
        $actvividad->view ='FICHA REPRODUCCION ARTIFICIAL';
        $actvividad->data='FichasReproduccionesArtificialesInactivos.pdf';
        $actvividad->subject_type =('App\Models\File_reproduction_artificial');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('FichasReproduccionesArtificialesInactivos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->view ='REGISTRO MATERIAL GENETICO';
        $actvividad->data ='MaterialesGeneticoInactivos.xlsx';
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        
        return Excel::download(new ArtificialReproductionInactivoExport, 'MaterialesGeneticoInactivos'.date('Y-m-d H:i:s').'.xlsx');
    }
    
    public function show($id)
    {
        return view('artificialR.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $razas = Race::all();
        
        $arti = Artificial_Reproduction::findOrFail($id);
   
        return view('artificialR.edit-inactivo', compact('arti','razas'));
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
        $arti = Artificial_Reproduction::findOrFail($id);
        $arti->actual_state = $request->actual_state;
        $arti->save(); 
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO INACTIVO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($arti->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$arti->reproduccion.'-'.$arti->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        return redirect('/inactivos/Materiales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request  )
    {
        $arti = Artificial_Reproduction::findOrFail($id);
        $arti->delete();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($arti->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$arti->reproduccion.'-'.$arti->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        
        return redirect('/inactivos/Materiales')->with('eliminar','ok');
    }
}
