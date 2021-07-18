<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_external;

class File_reproductionMEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raza = Race::all();
        $ext =  DB::table('file_reproduction_external')
        ->join('file_animale','external_mount.animalCode_id','=','file_animale.id')
        ->join('race as R','file_animale.race_id','=','R.id')
        ->join('race','external_mount.race_id','=','race.id')
        ->select('external_mount.id',
                    'external_mount.date_r',
                    'file_animale.animalCode',
                    'R.race_d as raza',
                    'file_animale.age_month as edad',
                    'file_animale.sex as sexo',

                    'external_mount.animalCode_Exte',
                    'race.race_d',
                    'external_mount.age_month',
                    'external_mount.sex',
                    'external_mount.hacienda_name')
        ->get();

        return view('file_reproductionME.index-external_M',compact('raza','ext'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
