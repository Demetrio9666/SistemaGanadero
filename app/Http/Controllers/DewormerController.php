<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dewormer;
use App\Http\Requests\StoreDewormer;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DewormerExport;

class DewormerController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Configuración de Desparacitante')->only('index');
        $this->middleware('can:Crear      Configuración de Desparacitante')->only('create','store');
        $this->middleware('can:Editar     Configuración de Desparacitante')->only('show','edit','update');
        $this->middleware('can:Eliminar   Configuración de Desparacitante')->only('delete');
    }

    public function index()
    {
        $desp = DB::table('dewormer')
            ->select('dewormer.id',
                    'dewormer.dewormer_d',
                    'dewormer.date_e',
                    'dewormer.date_c',
                    'dewormer.supplier',
                    'dewormer.actual_state')
                    ->where('dewormer.actual_state','=','DISPONIBLE')
            ->get();
        return view('dewormer.index-dewormer',compact('desp'));
    }

    public function PDF(){
        $desp = DB::table('dewormer')
        ->select('dewormer.id',
                'dewormer.dewormer_d',
                'dewormer.date_e',
                'dewormer.date_c',
                'dewormer.supplier',
                'dewormer.actual_state')
                ->where('dewormer.actual_state','=','DISPONIBLE')
        ->get();
        $pdf = PDF::loadView('dewormer.pdf',compact('desp'));
        return $pdf->setPaper('a4','landscape')->download('RegistrosDesparasitantes.pdf');
    }
    public function Excel(){
        return Excel::download(new DewormerExport, 'RegistrosDesparasitantes.xlsx');
    }








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dewormer.create-dewormer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDewormer $request)
    {
        $desp = new Dewormer();
        $desp->dewormer_d = $request->dewormer_d;
        $desp->date_e = $request->date_e;
        $desp->date_c = $request->date_c;
        $desp->supplier = $request->supplier;
        $desp->actual_state = $request->actual_state;
        $desp->save(); 
    
        //return redirect()->route();
        return redirect('/confDespa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dewormer.edit-dewormer',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desp = Dewormer::findOrFail($id);
        return view('dewormer.edit-dewormer', compact('desp'));
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
        $desp = Dewormer::findOrFail($id);
        $desp->dewormer_d = $request->dewormer_d;
        $desp->date_e = $request->date_e;
        $desp->date_c = $request->date_c;
        $desp->supplier = $request->supplier;
        $desp->actual_state = $request->actual_state;
        $desp->save(); 
        return redirect('/confDespa');
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
