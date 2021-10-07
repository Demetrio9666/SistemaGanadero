<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vitamin;
use App\Http\Requests\StoreVitamin;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VitaminExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class VitaminController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:confVi.index')->only('index');
        $this->middleware('can:confVi.create')->only('create','store');
        $this->middleware('can:confVi.edit')->only('show','edit','update');
        $this->middleware('can:confVi.destroy')->only('delete');
    }

    public function index()
    {
        $vitamina= DB::table('vitamin')
                    ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
                    ->where('actual_state','=','ACTIVO')
                    ->get();
        
        return view('vitamin.index-vitamin',compact('vitamina'));
    }
    public function PDF(){
        $vitamina= DB::table('vitamin')
                    ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
                    ->where('actual_state','=','ACTIVO')
                    ->get(); 
        $pdf = PDF::loadView('vitamin.pdf',compact('vitamina'));
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
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = 'RegistrosVitaminasActivos.pdf';
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosVitaminasActivos-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = 'RegistrosVitaminasActivos.xlsx';
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();

        return Excel::download(new VitaminExport,'RegistrosVitaminasActivos-'.date('Y-m-d H:i:s').'.xlsx');
    }


    public function create()
    {
        return view('vitamin.create-vitamin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVitamin $request)
    {
        $vitamina = new Vitamin();
        
        $vitamina->vitamin_d = $request->vitamin_d;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->actual_state = $request->actual_state;
        
        $vitamina->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = $request->vitamin_d;
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();
      
        return redirect('/confVi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('vitamin.edit-vitamin',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamina = Vitamin::findOrFail($id);
        return view('vitamin.edit-vitamin', compact('vitamina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVitamin $request, $id)
    {
        $vitamina = Vitamin::findOrFail($id);
        $vitamina->vitamin_d = $request->vitamin_d;
        $vitamina->date_e = $request->date_e;
        $vitamina->date_c = $request->date_c;
        $vitamina->supplier = $request->supplier;
        $vitamina->actual_state = $request->actual_state;
        $vitamina->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO VITAMINA';
        $actvividad->data = $request->vitamin_d;
        $actvividad->subject_type =('App\Models\Vitamin');
        
        $actvividad->save();
        return redirect('/confVi');
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
