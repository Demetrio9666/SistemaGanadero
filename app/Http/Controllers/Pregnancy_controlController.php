<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Pregnancy_control;
use App\Models\Vitamin;
use App\Http\Requests\StorePregnancyC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Pregnancy_controlExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Pregnancy_controlController extends Controller
{
    public function __construct(){
        $this->middleware('can:controlPrenes.index')->only('index');
        $this->middleware('can:controlPrenes.create')->only('create','store');
        $this->middleware('can:controlPrenes.edit')->only('show','edit','update');
        $this->middleware('can:controlPrenes.destroy')->only('delete');
    }

    public function index()
    {
        $pre = DB::table('pregnancy_control')
             ->join('vitamin','pregnancy_control.vitamin_id','=','vitamin.id')
             ->join('file_animale','pregnancy_control.animalCode_id','=','file_animale.id')
             ->select('pregnancy_control.id',
                      'pregnancy_control.date',
                       'file_animale.animalCode as animal',
                        'vitamin.vitamin_d as vitamina',
                        'pregnancy_control.alternative1 as alt1',
                        'pregnancy_control.alternative2  as alt2',
                         'pregnancy_control.observation',
                        'pregnancy_control.date_r',
                        'pregnancy_control.actual_state')
                        ->where('pregnancy_control.actual_state','=','ACTIVO')
             ->get();     
        return view('PregnancyC.index-PregnancyC',compact('pre'));
    }

    public function PDF(){
        $pre = DB::table('pregnancy_control')
        ->join('vitamin','pregnancy_control.vitamin_id','=','vitamin.id')
        ->join('file_animale','pregnancy_control.animalCode_id','=','file_animale.id')
        ->select('pregnancy_control.id',
                 'pregnancy_control.date',
                  'file_animale.animalCode as animal',
                   'vitamin.vitamin_d as vitamina',
                   'pregnancy_control.alternative1 as alt1',
                   'pregnancy_control.alternative2  as alt2',
                    'pregnancy_control.observation',
                   'pregnancy_control.date_r',
                   'pregnancy_control.actual_state')
                   ->where('pregnancy_control.actual_state','=','ACTIVO')
        ->get();    
        $pdf = PDF::loadView('PregnancyC.pdf',compact('pre'));

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
        $actvividad->view ='CONTROL PREÑES';
       
        $actvividad->data = 'ControlesPreñesActivos.pdf';
     
        $actvividad->subject_type =('App\Models\Pregnancy_control');
    
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('ControlesPreñesActivos-'.date('Y-m-d H:i:s').'.pdf');

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
        $actvividad->view ='CONTROL PREÑES';
       
        $actvividad->data = 'ControlesPreñesActivos.xlsx';
     
        $actvividad->subject_type =('App\Models\Pregnancy_control');
    
        $actvividad->save();

        return Excel::download(new Pregnancy_controlExport, 'ControlesPreñesActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $vitamina= DB::table('vitamin')
        ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
        ->where('actual_state','=','ACTIVO')
        ->get();
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  
                  ->where('gestation_state','=', 'SI')
                  ->where('sex','Hembra')
                  ->where('actual_state','=','ACTIVO')
                  
        ->get();
        return view('PregnancyC.create-PregnancyC',compact('vitamina','animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePregnancyC $request)
    {
        $pre = new Pregnancy_control();
       
        $pre->date = $request->date;
        $pre->animalCode_id = $request->animalCode_id;
        $pre->vitamin_id = $request->vitamin_id;
        $pre->alternative1 = $request->alternative1;
        $pre->alternative2 = $request->alternative2;
        $pre->observation = $request->observation;
        $pre->date_r = $request->date_r;
        $pre->actual_state = $request->actual_state;
        
        $pre->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='CONTROL PREÑES';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        $actvividad->subject_type =('App\Models\Pregnancy_control');
    
        $actvividad->save();

        return redirect('/controlPrenes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pregnancyC.edit-pregnancyC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamina= DB::table('vitamin')
        ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
        ->where('actual_state','=','ACTIVO')
        ->get();
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )
                  ->where('gestation_state','=', 'SI')
                  ->where('sex','Hembra')
                  ->where('actual_state','=','ACTIVO')
        ->get();
        $pre = Pregnancy_control::findOrFail($id);
        return view('pregnancyC.edit-pregnancyC', compact('pre','vitamina','animal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePregnancyC $request, $id)
    {
        $pre = Pregnancy_control::findOrFail($id);
        $pre->date = $request->date;
        $pre->animalCode_id = $request->animalCode_id;
        $pre->vitamin_id = $request->vitamin_id;
        $pre->alternative1 = $request->alternative1;
        $pre->alternative2 = $request->alternative2;
        $pre->observation = $request->observation;
        $pre->date_r = $request->date_r;
        $pre->actual_state = $request->actual_state;
        $pre->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='CONTROL PREÑES';

        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode'  
                  )->get();
        foreach($animal as $i ){
            if($request->animalCode_id == $i->id){
                    $animal_Code=$i->animalCode;
                    $actvividad->data = $animal_Code;
            }
        }
        $actvividad->subject_type =('App\Models\Pregnancy_control');
    
        $actvividad->save();
        return redirect('/controlPrenes');
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
