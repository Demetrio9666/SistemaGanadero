<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File_animale;
use App\Models\Weigth_control;
use App\Http\Requests\StoreWeigthC;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Weigth_controlExport;

class Weigth_controlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesoC = DB::table('weigth_control')
                ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                ->select('weigth_control.id'
                ,'weigth_control.date',
                'file_animale.animalCode as animal',
                'weigth_control.weigtht',
                'weigth_control.date_r',
                'weigth_control.actual_state')
                ->where('weigth_control.actual_state','=','Disponible')
                ->get();
        return view('weigthC.index-weigthC',compact('pesoC'));
    }
    public function PDF(){
        $pesoC = DB::table('weigth_control')
                ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
                ->select('weigth_control.id'
                ,'weigth_control.date',
                'file_animale.animalCode as animal',
                'weigth_control.weigtht',
                'weigth_control.date_r',
                'weigth_control.actual_state')
                ->where('weigth_control.actual_state','=','Disponible')
                ->get();
        $pdf = PDF::loadView('weigthC.pdf',compact('pesoC'));
        return $pdf->setPaper('a4','landscape')->download('ControlPeso.pdf');
    }
    public function Excel(){
        return Excel::download(new Weigth_controlExport, 'RegistrosAntibioticos.xlsx');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('weigthC.create-weigthC',compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeigthC $request)
    {
        $pesoC = new Weigth_control();
       
        $pesoC->date = $request->date;
        $pesoC->animalCode_id = $request->animalCode_id;
        $pesoC->weigtht = $request->weigtht;
        $pesoC->date_r = $request->date_r;
        $pesoC-> actual_state = $request-> actual_state;

        $pesoC->save(); 
            //return redirect()->route();
        return redirect('/controlPeso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('weigthC.edit-weigthC',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $animal  = DB::table('file_animale')
        ->select(    'id',
                     'animalCode',
                     'date',
                     'age_month',
                     'sex'
                  )->where('actual_state','=','Disponible')
                  
        ->get();
        return view('weigthC.edit-weigthC', compact('pesoC','animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWeigthC $request, $id)
    {
        $pesoC = Weigth_control::findOrFail($id);
        $pesoC->date = $request->date;
        $pesoC->animalCode_id = $request->animalCode_id;
        $pesoC->weigtht = $request->weigtht;
        $pesoC->date_r = $request->date_r;
        $pesoC-> actual_state = $request-> actual_state;
       
        $pesoC->save(); 
       
        return redirect('/controlPeso');
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
