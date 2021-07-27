<?php

namespace App\Http\Controllers;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Artificial_Reproduction;
use App\Http\Requests\StoreArtificial;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArtificialReproductionExport;

class ArtificialReproductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arti= DB::table('artificial_reproduction')
                    ->join('race','race.id','=','artificial_reproduction.race_id')
                    ->select('artificial_reproduction.id',
                            'artificial_reproduction.date',
                            'race.race_d  as raza',
                            'artificial_reproduction.reproduccion',
                            'artificial_reproduction.supplier',
                            'artificial_reproduction.actual_state'
                    )->where('artificial_reproduction.actual_state','=','Disponible')
                ->get();

       return view('artificialR.index-artificialR',compact('arti'));
    }

    public function PDF(){
        $arti= DB::table('artificial_reproduction')
                ->join('race','race.id','=','artificial_reproduction.race_id')
                ->select('artificial_reproduction.id',
                            'artificial_reproduction.date',
                            'race.race_d  as raza',
                            'artificial_reproduction.reproduccion',
                            'artificial_reproduction.supplier',
                            'artificial_reproduction.actual_state'
                )->where('artificial_reproduction.actual_state','=','Disponible')
            ->get();
            $pdf = PDF::loadView('artificialR.pdf',compact('arti'));
            return $pdf->setPaper('a4','landscape')->download('MaterialGenetico.pdf');


    }
    public function Excel() {
        return Excel::download(new ArtificialReproductionExport, 'MaterialGenetico.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $razas = Race::all();
        return view('artificialR.create-artificialR',compact('razas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtificial $request)
    {
        $arti = new Artificial_Reproduction();
        $arti->date = $request->date;
        $arti->race_id = $request->race_id;
        $arti->reproduccion = $request->reproduccion;
        $arti->supplier = $request->supplier;
        $arti->actual_state = $request->actual_state;
        $arti->save(); 
    
        //return redirect()->route();
        return redirect('/confMate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('artificialR.edit-artificialR',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $razas = Race::all();
        
        $arti = Artificial_Reproduction::findOrFail($id);
   
        return view('artificialR.edit-artificialR', compact('arti','razas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArtificial $request, $id)
    {
        $arti = Artificial_Reproduction::findOrFail($id);
        $arti->date = $request->date;
        $arti->race_id = $request->race_id;
        $arti->reproduccion = $request->reproduccion;
        $arti->supplier = $request->supplier;
        $arti->actual_state = $request->actual_state;
        $arti->save(); 
        return redirect('/confMate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arti = Artificial_Reproduction::findOrFail($id);
        $arti->delete();
        return redirect('/confMate')->with('eliminar','ok');
    }
}
