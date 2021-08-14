<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Http\Requests\StoreVaccine;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VaccineExport;
use Spatie\Activitylog\Models\Activity;

class VaccineController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:confVacuna.index')->only('index');
        $this->middleware('can:confVacuna.create')->only('create','store');
        $this->middleware('can:confVacuna.edit')->only('show','edit','update');
        $this->middleware('can:confVacuna.destroy')->only('delete');
    }

    public function index()
    {   
        $vacuna = DB::table('vaccine')
        ->select('id',
                    'vaccine_d',
                    'date_e',
                    'date_c',
                    'supplier',
                    'actual_state')
                    ->Where('actual_state','=','Disponible')
        ->get();
        
        return view('vaccine.index-vaccine',compact('vacuna'));
    }

    public function PDF(){
        $vacuna = DB::table('vaccine')
        ->select('id',
                    'vaccine_d',
                    'date_e',
                    'date_c',
                    'supplier',
                    'actual_state')
                    ->Where('actual_state','=','Disponible')
        ->get();
        $pdf = PDF::loadView('vaccine.pdf',compact('vacuna'));
        return $pdf->setPaper('a4','landscape')->download('RegistrosVacunas.pdf');
    }

    public function Excel(){
        return Excel::download(new VaccineExport, 'RegistrosVacunas.xlsx');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('vaccine.create-vaccine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccine $request)
    {
        $vacuna = new Vaccine();
        
        $vacuna->vaccine_d = $request->vaccine_d;
        $vacuna->date_e = $request->date_e;
        $vacuna->date_c = $request->date_c;
        $vacuna->supplier = $request->supplier;
        $vacuna->actual_state = $request->actual_state;
        $vacuna->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO VACUNA';
        $actvividad->data = $request->vaccine_d;
        $actvividad->subject_type =('App\Models\Vaccine');
        
        $actvividad->save();
        
        //return redirect()->route();
        return redirect('/confVacuna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vaccine.edit-vaccine',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacuna = Vaccine::findOrFail($id);
        return view('vaccine.edit-vaccine', compact('vacuna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVaccine $request, $id)
    {
        $vacuna = Vaccine::findOrFail($id);
        $vacuna->vaccine_d = $request->vaccine_d;
        $vacuna->date_e = $request->date_e;
        $vacuna->date_c = $request->date_c;
        $vacuna->supplier = $request->supplier;
        $vacuna->actual_state = $request->actual_state;
        $vacuna->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO VACUNA';
        $actvividad->data = $request->vaccine_d;
        $actvividad->subject_type =('App\Models\Vaccine');
        
        $actvividad->save();
        return redirect('/confVacuna');
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
