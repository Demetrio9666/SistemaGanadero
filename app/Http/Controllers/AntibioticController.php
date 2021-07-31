<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antibiotic;
use App\Http\Requests\StoreAntibiotic;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AntibioticosExport;

class AntibioticController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Configuración de antibióticos')->only('index');
        $this->middleware('can:Crear      Configuración de antibióticos')->only('create','store');
        $this->middleware('can:Editar     Configuración de antibióticos')->only('show','edit','update');
        $this->middleware('can:Eliminar   Configuración de antibióticos')->only('delete');
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
                  ->where('antibiotic.actual_state','=','Disponible')
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
                  ->where('antibiotic.actual_state','=','Disponible')
       ->get();
       $pdf = PDF::loadView('antibiotic.pdf',compact('anti'));
       return $pdf->setPaper('a4','landscape')->download('RegistrosAntibioticos.pdf');

    }

    public function Excel(){
        return Excel::download(new AntibioticosExport, 'RegistrosAntibioticos.xlsx');
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
