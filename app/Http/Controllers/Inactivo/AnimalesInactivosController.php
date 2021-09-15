<?php

namespace App\Http\Controllers\Inactivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Inactivo\File_AnimalesInactivoExport;

class AnimalesInactivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal = DB::table('file_animale')
                    ->leftJoin('race','file_animale.race_id','=','race.id')
                    ->leftJoin('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.url','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                ->where('file_animale.actual_state', '=', 'Inactivo' )
        ->get();
        return view('file_animale.index-inactivo',compact('animal'));
    }

    public function PDF(Request $request){
        $animal = DB::table('file_animale')
        ->leftJoin('race','file_animale.race_id','=','race.id')
        ->leftJoin('location','file_animale.location_id','=','location.id')
        ->select('file_animale.id','file_animale.animalCode','file_animale.date','race.race_d as raza',
                'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                ,'file_animale.conceived')
                ->where('file_animale.actual_state','=','INACTIVO')
        ->get();
    
        $pdf = PDF::loadView('file_animale.pdf-inactivo',compact('animal'));
        ///segunda forma de enviar el rol 
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
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data ='FichaAnimalesInactivos.pdf';
        $actvividad->subject_type =('App\Models\File_Animale');

        return $pdf->setPaper('a4','landscape')->download('FichaAnimalesInactivos-'.date('Y-m-d H:i:s').'.pdf');
        
    }
    public function Excel() 
    {
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
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data ='FichasAnimalesInactivo.xlsx';
        $actvividad->subject_type =('App\Models\File_Animale');
        $actvividad->save();

        return Excel::download(new File_AnimalesInactivoExport, 'FichasAnimalesInactivo-'.date('Y-m-d H:i:s').'.xlsx');
    }

    public function show($id)
    {
        return view('file_animale.edit-inactivo',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza =Race::all();
        $ubicacion=Location::all();
        $animal = File_Animale::findOrFail($id);
        return view('file_animale.edit-inactivo', compact('animal','raza','ubicacion'));
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
        $animal = File_Animale::findOrFail($id);
        $animal->actual_state = $request->actual_state;
        $animal->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA ANIMAL INACTIVA';
        $actvividad->data =$animal->animalCode;
        $actvividad->subject_type =('App\Models\File_Animale');
    
        $actvividad->save();
        return redirect('inactivos/fichaAnimales'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request  )
    {
        $animal = File_Animale::findOrFail($id);


        $destino = $animal->url;
        $url_replazo = str_replace('storage','public',$destino);
        Storage::delete( $url_replazo);

        $animal->delete();

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description ='ELIMINAR';
        $actvividad->view ='FICHA ANIMAL';
        $actvividad->data =$animal->animalCode;
        $actvividad->subject_type =('App\Models\File_Animale');
    
        $actvividad->save();
      

        return redirect('inactivos/fichaAnimales')->with('eliminar','ok');
    }
}
