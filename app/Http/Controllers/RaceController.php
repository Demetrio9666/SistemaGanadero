<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRace;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RaceExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class RaceController extends Controller
{
    public function __construct(){
        $this->middleware('can:confRaza.index')->only('index');
        $this->middleware('can:confRaza.create')->only('create','store');
        $this->middleware('can:confRaza.edit')->only('show','edit','update');
        $this->middleware('can:confRaza.destroy')->only('delete');
    }

    public function index()
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','ACTIVO')
                    ->get();
        return view('race.index-race',compact('raza'));
        
    }
    public function PDF(){
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','ACTIVO')
                    ->get();
        $pdf = PDF::loadView('race.pdf',compact('raza'));
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
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = 'RegistrosRazasActivos.pdf';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        return $pdf->setPaper('a4','landscape')->download('RegistrosRazasActivos-'.date('Y-m-d H:i:s').'.pdf');
        
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
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = 'RegistrosRazasActivos.xlsx';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();

        return Excel::download(new RaceExport, 'RegistrosRazasActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('race.create-race');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRace  $request)
    {
        $raza = new Race();
        
        $raza->race_d = $request->race_d;
        $raza->percentage = $request->percentage;
        $raza->actual_state =$request->actual_state;
        $raza->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = $request->race_d.'-'.$request->percentage.'%';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        
        return redirect('/confRaza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('race.edit-race',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza = Race::findOrFail($id);
        return view('race.edit-race', compact('raza'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRace  $request, $id)
    {
        $raza = Race::findOrFail($id);
        $raza->race_d = $request->race_d;
        $raza->percentage = $request->percentage;
        $raza->actual_state =$request->actual_state;
        $raza->save();
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO RAZA';

        $actvividad->data = $request->race_d.'-'.$request->percentage.'%';
        $actvividad->subject_type =('App\Models\Race');
        
        $actvividad->save();
        return redirect('/confRaza'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
