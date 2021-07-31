<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Models\File_animale;
use App\Models\Antibiotic;
use App\Models\File_treatment;
use App\Http\Requests\StoreFile_treatment;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_treatmentExport;

class File_treatmentController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Ficha de Tratamiento')->only('index');
        $this->middleware('can:Crear      Ficha de Tratamiento')->only('create','store');
        $this->middleware('can:Editar     Ficha de Tratamiento')->only('show','edit','update');
        $this->middleware('can:Eliminar   Ficha de Tratamiento')->only('delete');
    }

    public function index()
    {
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','Disponible')    
                
        ->get();

      return view('file_treatment.index-treatment',compact('tra'));
    }
    public function PDF(){
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','Disponible')    
                
        ->get();
        $pdf = PDF::loadView('file_treatment.pdf',compact('tra'));
        return $pdf->setPaper('a4','landscape')->download('FichaTratamiento.pdf');
    }
    public function Excel() {
        return Excel::download(new File_treatmentExport, 'FichaTratamiento.xlsx');
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $anti = Antibiotic::all();
        $vitamina = Vitamin::all();
        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'actual_state'
                     
                  )
                  ->where('health_condition','=','Enfermo')
                  ->where('actual_state','=','Disponible')->orwhere('actual_state','=','Reproduccion')
                  
        ->get();
        return view('file_treatment.create-treatment',compact('vitamina','animalT','anti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_treatment $request)
    {
        $tra = new File_treatment();
       
        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
        $tra->actual_state = $request->actual_state;
        

        $tra->save(); 

        return redirect('/fichaTratamiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_treatment.edit-treatment',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tra = File_treatment::findOrFail($id);
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','Disponible')
       ->get();
        $vitamina = DB::table('vitamin')
        ->select('vitamin.id',
        'vitamin.vitamin_d',
        'vitamin.actual_state')
        ->where('vitamin.actual_state','=','Disponible')
        ->get();


        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'actual_state'
                  )
                  ->where('actual_state','=','Disponible')->Orwhere('actual_state','=','Reproduccion')
                  ->where('health_condition','=','Enfermo')
        ->get();
        return view('file_treatment.edit-treatment',compact('vitamina','animalT','anti','tra'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_treatment $request, $id)
    {
        $tra = File_treatment::findOrFail($id);
        $tra->date= $request->date;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
        $tra->actual_state = $request->actual_state;
        $tra->save(); 

        return redirect('/fichaTratamiento');
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
