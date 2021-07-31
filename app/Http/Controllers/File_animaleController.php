<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Http\Requests\StoreFile_animale;
use App\Http\Requests\EditFile_animale;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_AnimalesExport;


class File_animaleController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Ficha de Animales')->only('index');
        $this->middleware('can:Crear      Ficha de Animales')->only('create','store');
        $this->middleware('can:Editar     Ficha de Animales')->only('show','edit','update');
        $this->middleware('can:Eliminar   Ficha de Animales')->only('delete');
    }


    public function index()
    {
        $animal = DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->join('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                            ->where('file_animale.actual_state', '=', 'DISPONIBLE' )->Orwhere('file_animale.actual_state', '=', 'REPRODUCCION')
                    ->get();
        return view('file_animale.index-animale',compact('animal'));
        //return $animal;

    }

    public function PDF(){
                    $animal = DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->join('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id','file_animale.animalCode','file_animale.date','race.race_d as raza',
                            'file_animale.sex','file_animale.stage','file_animale.source','file_animale.age_month',
                            'file_animale.health_condition','file_animale.gestation_state','file_animale.actual_state','location.location_d as ubicacion'
                            ,'file_animale.conceived')
                            ->where('file_animale.actual_state', '=', 'DISPONIBLE' )->Orwhere('file_animale.actual_state', '=', 'REPRODUCCION')
                    ->get();
                
        $pdf = PDF::loadView('file_animale.pdf',compact('animal'));

        //return $pdf->download('codingdriver.pdf');
       // return $pdf->setPaper('a4','landscape')->stream('FichaAnimal.pdf');
       return $pdf->setPaper('a4','landscape')->download('FichaAnimal.pdf');

       // return view('file_animale.pdf',compact('animal'));
}

    
    public function Excel() 
    {
        return Excel::download(new File_AnimalesExport, 'FichaAnimal.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();

         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','Disponible')
                    ->get();

        return view('file_animale.create-animale',compact('raza','ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_animale $request)
    {

        $animal = new File_Animale();
        
        $animal->animalCode = $request->codigo_animal;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;
        $animal->actual_state = $request->actual_state;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;
        $animal->save(); 
        
        //return redirect()->route();
        return redirect('/fichaAnimal')->with('Validad','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('file_animale.edit-animale',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','DISPONIBLE')
                    ->get();
         $ubicacion = DB::table('location')
         ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','DISPONIBLE')
                    ->get();
        $animal = File_Animale::findOrFail($id);
        return view('file_animale.edit-animale', compact('animal','raza','ubicacion'));
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
        
        $animal->animalCode = $request->codigo_animal;
        $animal->date = $request->fecha_nacimiento;
        $animal->race_id = $request->raza;
        $animal->sex = $request->sexo;
        $animal->stage = $request->etapa;
        $animal->source = $request->origen;
        $animal->age_month = $request->edad;
        $animal->health_condition = $request->estado_de_salud;
        $animal->gestation_state = $request->estado_de_gestacion;
        $animal->actual_state = $request->actual_state;
        $animal->location_id = $request->localizacion;
        $animal->conceived = $request->concebido;
        $animal->save(); 
      
        return redirect('/fichaAnimal'); 
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
