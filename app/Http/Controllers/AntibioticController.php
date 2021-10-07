<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antibiotic;
use App\Http\Requests\StoreAntibiotic;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AntibioticosExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class AntibioticController extends Controller
{
    public function __construct(){
        $this->middleware('can:confAnt.index')->only('index');
        $this->middleware('can:confAnt.create')->only('create','store');
        $this->middleware('can:confAnt.edit')->only('show','edit','update');
        $this->middleware('can:confAnt.destroy')->only('delete');
    }

    public function index()
    {
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','ACTIVO')
       ->get();
        return view('antibiotic.index-antibiotic',compact('anti'));
    }

    public function PDF(){
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','ACTIVO')
       ->get();
       $pdf = PDF::loadView('antibiotic.pdf',compact('anti'));
       
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
       $actvividad->view ='REGISTRO ANTIBIOTICO';
       $actvividad->data = 'RegistrosAntibioticos.pdf';
       $actvividad->subject_type =('App\Models\Antibiotic');
       
       $actvividad->save();

       return $pdf->setPaper('a4','landscape')->download('RegistrosAntibioticos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->view ='REGISTRO ANTIBIOTICO';
        $actvividad->data = 'RegistrosAntibioticosActivos.xlsx';
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
        return Excel::download(new AntibioticosExport, 'RegistrosAntibioticosActivos-'.date('Y-m-d H:i:s').'.xlsx');

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antibiotic.create-antibiotic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAntibiotic $request)
    {
        $anti = new Antibiotic();
        $anti->antibiotic_d = $request->antibiotic_d;
        $anti->date_e = $request->date_e;
        $anti->date_c = $request->date_c;
        $anti->supplier = $request->supplier;
        $anti->actual_state = $request->actual_state;
        $anti->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO ANTIBIOTICO';
        $actvividad->data = $request->antibiotic_d;
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
    
        //return redirect()->route();
        return redirect('/confAnt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('antibiotic.edit-antibiotic',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anti = Antibiotic::findOrFail($id);
        return view('antibiotic.edit-antibiotic', compact('anti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAntibiotic $request, $id)
    {
        $anti = Antibiotic::findOrFail($id);
        $anti->antibiotic_d = $request->antibiotic_d;
        $anti->date_e = $request->date_e;
        $anti->date_c = $request->date_c;
        $anti->supplier = $request->supplier;
        $anti->actual_state = $request->actual_state;
        $anti->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO ANTIBIOTICO';
        $actvividad->data = $request->antibiotic_d;
        $actvividad->subject_type =('App\Models\Antibiotic');
        
        $actvividad->save();
        return redirect('/confAnt');
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
