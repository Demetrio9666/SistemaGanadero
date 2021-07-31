<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Dewormer;
use App\Models\Deworming_control;
use App\Http\Requests\StoreDewormerC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Deworming_controlExport;

class Deworming_controlController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Control de Desparasitación')->only('index');
        $this->middleware('can:Crear      Control de Desparasitación')->only('create','store');
        $this->middleware('can:Editar     Control de Desparasitación')->only('show','edit','update');
        $this->middleware('can:Eliminar   Control de Desparasitación')->only('delete');
    }

    public function index()
    {
        $desC = DB::table('deworming_control')
                ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
                ->join('dewormer','deworming_control.deworming_id','=','dewormer.id')
                ->select('deworming_control.id',
                         'deworming_control.date',
                         'file_animale.animalCode as animal',
                         'dewormer.dewormer_d as des',
                         'deworming_control.date_r',
                         'deworming_control.actual_state')
                         ->where('deworming_control.actual_state','=','Disponible')
                ->get();
        return view('dewormerC.index-dewormerC',compact('desC'));
        //return $desC;
    }
    public function PDF(){
        $desC = DB::table('deworming_control')
                ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
                ->join('dewormer','deworming_control.deworming_id','=','dewormer.id')
                ->select('deworming_control.id',
                         'deworming_control.date',
                         'file_animale.animalCode as animal',
                         'dewormer.dewormer_d as des',
                         'deworming_control.date_r',
                         'deworming_control.actual_state')
                         ->where('deworming_control.actual_state','=','Disponible')
                ->get();
                $pdf = PDF::loadView('dewormerC.pdf',compact('desC'));
                return $pdf->setPaper('a4','landscape')->download('ControlDesparacitacion.pdf');

    }

    public function Excel(){
        return Excel::download(new Deworming_controlExport, 'ControlDesparacitacion.xlsx');
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $des =  DB::table('dewormer')
        ->select('id',
                'dewormer_d'
                )
        ->get();

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  
        ->get();
        return view('dewormerC.create-dewormerC',compact('animal','des'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDewormerC $request)
    {
        $desC = new Deworming_control();

       $desC->date = $request->date;
       $desC->animalCode_id = $request->animalCode_id;
       $desC->deworming_id = $request->deworming_id;
       $desC->date_r = $request->date_r;
       $desC->actual_state = $request->actual_state;
       
       $desC->save(); 
            //return redirect()->route();
        return redirect('/controlDesparasitacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dewormerC.edit-dewormerC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $des =  Dewormer::all();
        $desC = Deworming_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  
        ->get();

        return view('dewormerC.edit-dewormerC', compact('desC','des','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDewormerC $request, $id)
    {
        $desC = Deworming_control::findOrFail($id);

        $desC->date = $request->date;
        $desC->animalCode_id = $request->animalCode_id;
        $desC->deworming_id = $request->deworming_id;
        $desC->date_r = $request->date_r;
        $desC->actual_state = $request->actual_state;
      
        $desC->save(); 
        return redirect('/controlDesparasitacion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desC = Deworming_control::findOrFail($id);
        $desC->delete();
        return redirect('/controlDesparasitacion')->with('eliminar','ok'); 
    }
}
