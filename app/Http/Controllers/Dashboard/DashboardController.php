<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use App\Models\File_reproduction_artificial;
use App\Models\File_reproduction_internal;
use App\Models\File_reproduction_external;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('can:dashboard.index')->only('Dashboard','DashboardReproduccion');
       
    }

    public function Dashboard(){
    
        $disponible = File_Animale::whereIn('actual_state',['ACTIVO'])->count();
        $vendidos = File_Animale::whereIn('actual_state',['VENDIDO'])->count();

        
        $reproduccion = File_Animale::whereIn('actual_state',['REPRODUCCIÓN'])->count();
        $total = File_Animale::whereIn('actual_state',['ACTIVO','REPRODUCCIÓN','VENDIDO'])->count();

        $totales= $total - $vendidos;

        $vaca = File_Animale::where('stage',['VACA'])->whereIn('actual_state',['ACTIVO','REPRODUCCIÓN'])->count();
        $toro = File_Animale::where('stage',['TORO'])->whereIn('actual_state',['ACTIVO','REPRODUCCIÓN'])->count();
        $torete = File_Animale::where('stage',['TORETE'])->whereIn('actual_state',['ACTIVO'])->count();
        $terneroM = File_Animale::where('stage',['TERNERO'])->whereIn('actual_state',['ACTIVO'])->count();
       
        $vacona = File_Animale::where('stage',['VACONA'])->whereIn('actual_state',['ACTIVO','REPRODUCCIÓN'])->count();
        $vaconilla = File_Animale::where('stage',['VACONILLA'])->whereIn('actual_state',['ACTIVO'])->count();
        $terneroH = File_Animale::where('stage',['TERNERA'])->whereIn('actual_state',['ACTIVO'])->count();

        $data = [$toro,$torete,$terneroM,$vaca,$vacona,$vaconilla,$terneroH];
        $datas= json_encode($data);

        $macho = File_Animale::where('sex',['MACHO'])->whereIn('actual_state',['ACTIVO','REPRODUCCIÓN'])->count();
        $hembra = File_Animale::where('sex',['HEMBRA'])->whereIn('actual_state',['ACTIVO','REPRODUCCIÓN'])->count();

        $data2 = [$macho,$hembra];

        $datas2  = json_encode($data2);

        //return $datas;

        return view('dashboard.dashboard',compact('disponible','vendidos','reproduccion','totales','datas','datas2'));
    }

    public function DashboardReproduccion(){
        $artificial = File_reproduction_artificial::whereIn('actual_state',['ACTIVO'])->count();
        $natual = File_reproduction_internal::whereIn('actual_state',['ACTIVO'])->count();
        $externa = File_reproduction_external::whereIn('actual_state',['ACTIVO'])->count();
        //$reproduccionHembras = File_Animale::where('sex','=','HEMBRA') ->whereIn('actual_state',['REPRODUCCIÓN'])->count();
        $sumaNatual= $natual + $externa;

        $data = [$artificial, $sumaNatual ];
        $datas = json_encode($data);


        $embarazosVacona = File_Animale::where('stage',['VACONA'])->whereIn('gestation_state',['SI'])->count();
        $embarazosVaca = File_Animale::where('stage',['VACA'])->whereIn('gestation_state',['SI'])->count();
        $embarazosNo = File_Animale::where('sex','=','HEMBRA')->whereIn('gestation_state',['NO'])->count();
        $data2 = [$embarazosVacona, $embarazosVaca];
        $datas2 = json_encode($data2);

        return view('dashboard.reproduccion',compact('datas','datas2','artificial','natual','externa'));
    }

}


//SELECT COUNT( *) FROM `file_animale` WHERE `actual_state`='REPRODUCCION';