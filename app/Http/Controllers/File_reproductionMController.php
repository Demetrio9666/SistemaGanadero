<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_internal;
use App\Http\Requests\StoreFile_reproductionM;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_reproduction_internalExport;
use Spatie\Activitylog\Models\Activity;

class File_reproductionMController extends Controller
{
    public function __construct(){
        $this->middleware('can:fichaReproduccionM.index')->only('index');
        $this->middleware('can:fichaReproduccionM.create')->only('create','store');
        $this->middleware('can:fichaReproduccionM.edit')->only('show','edit','update');
        $this->middleware('can:fichaReproduccionM.destroy')->only('delete');
    }


    public function index()
    {
       $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.actual_state'
                      )->where('file_reproduction_internal.actual_state','=','Disponible')
                      
              ->get();

        return view('file_reproductionM.index-reproduction',compact('re_MI'));
    }
    public function PDF(){
        $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.actual_state'
                      )->where('file_reproduction_internal.actual_state','=','REPRODUCCION')
                      
              ->get();
              $pdf = PDF::loadView('file_reproductionM.pdf',compact('re_MI'));
              return $pdf->setPaper('a4','landscape')->download('FichaReproduccionMontaNaturalInterno.pdf');
    }
    public function Excel(){
        return Excel::download(new File_reproduction_internalExport, 'FichaReproduccionMontaNaturalInterno.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
        $animalRM= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->Where('file_animale.actual_state','=','REPRODUCIÓN')
                ->Where('file_animale.stage','=','Toro')
                
                ->get();
        $animalRH= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')
                ->Where('file_animale.actual_state','=','REPRODUCIÓN')
                ->where('file_animale.stage','=','Vaca')
                
                ->get();


        return view('file_reproductionM.create-reproduction',compact('raza','animalRM','animalRH'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_reproductionM $request)
    {
        $re = new File_reproduction_internal();
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->actual_state = $request->actual_state;
        $re->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_internal');
    
        $actvividad->save();
        return redirect('/fichaReproduccionM');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproductionM.edit-reproduction',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        $raza = DB::table('race')
        ->select('race.id',
                    'race.race_d',
                    'race.percentage',
                    'race.actual_state')
                    ->where('race.actual_state','=','Disponible')
                    ->get();
            $animalRM= DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->select('file_animale.id',
                    'file_animale.animalCode',
                    'file_animale.age_month',
                    'race.race_d',
                    'file_animale.sex')
                    ->Where('file_animale.actual_state','=','REPRODUCCIÓN')
                    ->Where('file_animale.stage','=','Toro')
                    ->get();
            $animalRH= DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->select('file_animale.id',
                    'file_animale.animalCode',
                    'file_animale.age_month',
                    'race.race_d',
                    'file_animale.sex')
                    ->Where('file_animale.actual_state','=','REPRODUCCIÓN')
                    ->where('file_animale.stage','=','Vaca')
                    
                    ->get();

        return view('file_reproductionM.edit-reproduction',compact('raza','animalRM','animalRH','re'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_reproductionM $request, $id)
    {
        $re =  File_reproduction_internal::findOrFail($id);
        
        
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->animalCode_id_p = $request->animalCode_id_p;
        $re->actual_state = $request->actual_state;
        
        $re->save();
        
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='FICHA REPRODUCCION MONTA NATURAL INTERNA';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id_m == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        
        
        $actvividad->subject_type =('App\Models\File_reproduction_internal');
    
        $actvividad->save();
        return redirect('/fichaReproduccionM');
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
