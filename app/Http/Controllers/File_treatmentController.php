<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Models\File_animale;
use App\Models\Antibiotic;
use App\Models\File_treatment;
class File_treatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date_r',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment'
                )
                
                
        ->get();


        //$tra = File_treatment::all();
    //return $tra;
      return view('file_treatment.index-treatment',compact('tra'));
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
                     'date_n',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition'
                     
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
    public function store(Request $request)
    {
        $tra = new File_treatment();
       
        $tra->date_r= $request->date_r;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
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
        $anti = Antibiotic::all();
        $vitamina = Vitamin::all();
        $animalT  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date_n',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition'

                  )
                  
                  ->where('actual_state','=','Disponible')
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
    public function update(Request $request, $id)
    {
        $tra = File_treatment::findOrFail($id);
        $tra->date_r= $request->date_r;
        $tra->animalCode_id = $request->animalCode_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->disease = $request->disease;
        $tra->detail = $request->detail;
        $tra->antibiotic_id = $request->antibiotic_id;
        $tra->vitamin_id = $request->vitamin_id;
        $tra->treatment = $request->treatment;
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
        $tra = File_treatment::findOrFail($id);
        $tra->delete();
        return redirect('/fichaTratamiento')->with('eliminar','ok');
    }
}
