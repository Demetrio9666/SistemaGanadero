<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dewormer;
use App\Http\Requests\StoreDewormer;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DewormerExport;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class DewormerController extends Controller
{
    public function __construct(){
        $this->middleware('can:confDespa.index')->only('index');
        $this->middleware('can:confDespa.create')->only('create','store');
        $this->middleware('can:confDespa.edit')->only('show','edit','update');
        $this->middleware('can:confDespa.destroy')->only('delete');
    }

    public function index()
    {
        $desp = DB::table('dewormer')
            ->select('dewormer.id',
                    'dewormer.dewormer_d',
                    'dewormer.date_e',
                    'dewormer.date_c',
                    'dewormer.supplier',
                    'dewormer.actual_state')
                    ->where('dewormer.actual_state','=','ACTIVO')
            ->get();
        return view('dewormer.index-dewormer',compact('desp'));
    }

    public function PDF(){
        $desp = DB::table('dewormer')
        ->select('dewormer.id',
                'dewormer.dewormer_d',
                'dewormer.date_e',
                'dewormer.date_c',
                'dewormer.supplier',
                'dewormer.actual_state')
                ->where('dewormer.actual_state','=','ACTIVO')
        ->get();
        $pdf = PDF::loadView('dewormer.pdf',compact('desp'));

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
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data ='RegistrosDesparasitantes.pdf';
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();

        return $pdf->setPaper('a4','landscape')->download('RegistrosDesparasitantes-'.date('Y-m-d H:i:s').'.pdf');
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
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data ='RegistrosDesparasitantesActivos.xlsx';
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();

        return Excel::download(new DewormerExport, 'RegistrosDesparasitantesActivos'.date('Y-m-d H:i:s').'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dewormer.create-dewormer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDewormer $request)
    {
        $desp = new Dewormer();
        $desp->dewormer_d = $request->dewormer_d;
        $desp->date_e = $request->date_e;
        $desp->date_c = $request->date_c;
        $desp->supplier = $request->supplier;
        $desp->actual_state = $request->actual_state;
        $desp->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data = $request->dewormer_d;
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();
        //return redirect()->route();
        return redirect('/confDespa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dewormer.edit-dewormer',compact('id'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desp = Dewormer::findOrFail($id);
        return view('dewormer.edit-dewormer', compact('desp'));
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
        $desp = Dewormer::findOrFail($id);
        $desp->dewormer_d = $request->dewormer_d;
        $desp->date_e = $request->date_e;
        $desp->date_c = $request->date_c;
        $desp->supplier = $request->supplier;
        $desp->actual_state = $request->actual_state;

        $desp->save(); 

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO DESPARASITANTE';
        $actvividad->data = $request->dewormer_d;
        $actvividad->subject_type =('App\Models\Dewormer');
        
        $actvividad->save();
        return redirect('/confDespa');
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
