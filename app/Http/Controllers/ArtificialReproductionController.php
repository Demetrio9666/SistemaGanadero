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
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ArtificialReproductionController extends Controller
{
    public function __construct(){
        $this->middleware('can:confMate.index')->only('index');
        $this->middleware('can:confMate.create')->only('create','store');
        $this->middleware('can:confMate.edit')->only('show','edit','update');
        $this->middleware('can:confMate.destroy')->only('delete');
    }

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
                    )->where('artificial_reproduction.actual_state','=','ACTIVO')
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
                )->where('artificial_reproduction.actual_state','=','ACTIVO')
            ->get();
            $pdf = PDF::loadView('artificialR.pdf',compact('arti'));

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
            $actvividad->view ='REGISTRO MATERIAL GENETICO';
            $actvividad->data ='MaterialesGeneticoActivos.pdf';
            $actvividad->subject_type =('App\Models\Artificial_Reproduction');
            
            $actvividad->save();
        

            return $pdf->setPaper('a4','landscape')->download('MaterialesGeneticoActivos-'.date('Y-m-d H:i:s').'.pdf');


    }
    public function Excel() {
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
        $actvividad->view ='REGISTRO MATERIAL GENETICO';
        $actvividad->data ='MaterialesGeneticoActivos.xlsx';
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
        
        return Excel::download(new ArtificialReproductionExport, 'MaterialesGeneticoActivos'.date('Y-m-d H:i:s').'.xlsx');
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
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($request->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$request->reproduccion.'-'.$request->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
    
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
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO MATERIAL GENETICO';

        $raza  = DB::table('race')
        ->select(    'id',
                     'race_d'  
                  )->get();
        foreach($raza as $i ){
            if($request->race_id == $i->id){
                    $race_dd=$i->race_d;
            }
        }

        $actvividad->data = $race_dd.'-'.$request->reproduccion.'-'.$request->supplier;
        $actvividad->subject_type =('App\Models\Artificial_Reproduction');
        
        $actvividad->save();
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
        
    }
}
