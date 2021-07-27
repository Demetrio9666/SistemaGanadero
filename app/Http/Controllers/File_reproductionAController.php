<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
use App\Models\Artificial_Reproduction;
use App\Http\Requests\StoreFile_reproductionA;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\File_reproduction_artificialExport;

class File_reproductionAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->join('race as f','file_animale.race_id','=','f.id')
                    ->Join('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','DISPONIBLE')
                            
                    ->get(); 
  
        return view('file_reproductionA.index-reproductionA',compact('re_A'));
    }
    public function PDF(){
        $re_A = DB::table('file_reproduction_artificial')
        ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
        ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
        ->join('race as f','file_animale.race_id','=','f.id')
        ->Join('race as a','artificial_reproduction.race_id','=','a.id')
        ->select('file_reproduction_artificial.id',
                'file_reproduction_artificial.date as fecha_A',
                'file_animale.animalCode as animalA',
                'f.race_d as raza_h',  
                'artificial_reproduction.reproduccion as tipo', 
                'a.race_d as raza_m',
                'file_reproduction_artificial.actual_state'
                )
                ->where('file_reproduction_artificial.actual_state','=','DISPONIBLE')
                
        ->get(); 
        $pdf = PDF::loadView('file_reproductionA.pdf',compact('re_A'));
        return $pdf->setPaper('a4','landscape')->download('FichaReproduccionArtificial.pdf');

    }
    public function Excel(){
        return Excel::download(new File_reproduction_artificialExport, 'FichaReproduccionArtificial.xlsx');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animalRH= DB::table('file_animale')
                ->join('race','file_animale.race_id','=','race.id')
                ->select('file_animale.id',
                'file_animale.animalCode',
                'file_animale.age_month',
                'race.race_d',
                'file_animale.sex')

                ->where('file_animale.gestation_state','=','NO')
                ->where('file_animale.stage','=','VACA')
                ->where('file_animale.actual_state','=','DISPONIBLE')
                ->get();

        $raza = DB::table('race')
                        ->select('race.id',
                        'race.race_d',
                        'race.percentage',
                        'race.actual_state')
                        ->where('race.actual_state','=','DISPONIBLE')
                ->get();


        $re_A = DB::table('file_reproduction_artificial')
        ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
        ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
        ->join('race as f','file_animale.race_id','=','f.id')
        ->Join('race as a','artificial_reproduction.race_id','=','a.id')
        ->select('file_reproduction_artificial.id',
                'file_reproduction_artificial.date as fecha_A',
                'file_animale.animalCode as animalA',
                'f.race_d as raza_h',  
                'artificial_reproduction.reproduccion as tipo', 
                'a.race_d as raza_m'
                )->where('file_reproduction_artificial.actual_state','=','DISPONIBLE')
        ->get(); 
        $arti= DB::table('artificial_Reproduction')
        ->join('race','artificial_Reproduction.race_id','=','race.id')
        ->select('artificial_Reproduction.id',
        'race.race_d',
        'artificial_Reproduction.reproduccion',
        'artificial_Reproduction.supplier'
        )->where('artificial_Reproduction.actual_state','=','DISPONIBLE')
        ->get();  

       
        return view('file_reproductionA.create-reproductionA',compact('raza','animalRH','arti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_reproductionA $request)
    {
        $re = new File_reproduction_artificial();
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->artificial_id = $request->artificial_id;
        $re->actual_state = $request->actual_state;
        $re->save(); 
        return redirect('/fichaReproduccionA');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('file_reproductionA.edit-reproductionA',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $re =  File_reproduction_artificial::findOrFail($id);
        $animalRH= DB::table('file_animale')
        ->join('race','file_animale.race_id','=','race.id')
        ->select('file_animale.id',
        'file_animale.animalCode',
        'file_animale.age_month',
        'race.race_d',
        'file_animale.sex')
                 ->where('file_animale.gestation_state','=','NO')
                ->where('file_animale.stage','=','VACA')
                ->where('file_animale.actual_state','=','DISPONIBLE')
        ->get();
        $raza =Race::all();
        $re_A = DB::table('file_reproduction_artificial')
        ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
        ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
        ->join('race as f','file_animale.race_id','=','f.id')
        ->Join('race as a','artificial_reproduction.race_id','=','a.id')
        ->select('file_reproduction_artificial.id',
                'file_reproduction_artificial.date as fecha_A',
                'file_animale.animalCode as animalA',
                'f.race_d as raza_h',  
                'artificial_reproduction.reproduccion as tipo', 
                'a.race_d as raza_m'
                )
        ->get(); 
        $arti= DB::table('artificial_Reproduction')
        ->join('race','artificial_Reproduction.race_id','=','race.id')
        ->select('artificial_Reproduction.id',
        'race.race_d',
        'artificial_Reproduction.reproduccion',
        'artificial_Reproduction.supplier'
        )
        ->get();    

        return view('file_reproductionA.edit-reproductionA',compact('raza','animalRH','arti','re'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFile_reproductionA $request, $id)
    {
        $re =  File_reproduction_artificial::findOrFail($id);
        
        
        $re->date= $request->date;
        $re->animalCode_id_m = $request->animalCode_id_m;
        $re->artificial_id = $request->artificial_id;
        $re->actual_state = $request->actual_state;
        
        $re->save(); 
        return redirect('/fichaReproduccionA');
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
