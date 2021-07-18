<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\File_partum;
use App\Models\Vitamin;
use App\Http\Requests\StoreFile_partum;

class File_partumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $par = DB::table('file_partum')
        
        ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
        ->select('file_partum.id',
                 'file_partum.date',
                 'file_animale.animalCode as animal',
                 'file_partum.male',
                 'file_partum.female',
                 'file_partum.dead',
                 'file_partum.mother_status',
                 'file_partum.partum_type',
                 'file_partum.actual_state'
                )
                
                
        ->get();


        //$tra = File_treatment::all();
    //return $tra;
      return view('file_partum.index-partum',compact('par'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $animalP  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'gestation_state',
                     'actual_state'
                     
                  )
                  ->where('gestation_state','=','Si')
                  ->where('actual_state','=','Disponible')->orwhere('actual_state','=','Reproduccion')
                  
        ->get();
        return view('file_partum.create-partum',compact('animalP'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_partum $request)
    {
        $par = new File_partum();
       
        $par->date= $request->date;
        $par->animalCode_id = $request->animalCode_id;
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        $par->mother_status = $request->mother_status;
        $par->partum_type = $request->partum_type;
        $par->actual_state = $request->actual_state;
        
        $par->save(); 

        return redirect('/fichaParto')->with('Validad','ok');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_partum.edit-partum',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $par =  File_partum::findOrFail($id);
        $animalP  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex',
                     'actual_state',
                     'health_condition',
                     'gestation_state',
                     'actual_state'
                     
                  )
                  ->where('gestation_state','=','Si')
                  ->where('actual_state','=','Disponible')->orwhere('actual_state','=','Reproduccion')
                  
        ->get();
                  
        
        return view('file_partum.edit-partum',compact('animalP','par'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_partum $request, $id)
    {
        $par =  File_partum::findOrFail($id);

        $par->date= $request->date;
        $par->animalCode_id = $request->animalCode_id;
        $par->male = $request->male;
        $par->female = $request->female;
        $par->dead = $request->dead;
        $par->mother_status = $request->mother_status;
        $par->partum_type = $request->partum_type;
        $par->actual_state = $request->actual_state;
        
        $par->save(); 

        return redirect('/fichaParto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $par =  File_partum::findOrFail($id);
        $par->delete();
        return redirect('/fichaParto')->with('eliminar','ok');
    }
}
