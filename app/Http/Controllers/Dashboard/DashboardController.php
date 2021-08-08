<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('can:dashboard.index')->only('Dashboard','DashboardReproduccion');
       
    }

    public function Dashboard(){
    
        $disponible = File_Animale::whereIn('actual_state',['DISPONIBLE'])->count();
        $vendidos = File_Animale::whereIn('actual_state',['VENDIDO'])->count();
        $reproduccion = File_Animale::whereIn('actual_state',['REPRODUCCION'])->count();
        $total = File_Animale::whereIn('actual_state',['DISPONIBLE','REPRODUCCION','VENDIDO'])->count();

        $toro = File_Animale::whereIn('stage',['TORO'])->count();
        $torete = File_Animale::whereIn('stage',['TORETE'])->count();
        $terneroM = File_Animale::where('sex','=','MACHO') ->whereIn('stage',['TERNERO'])->count();
        $vaca = File_Animale::whereIn('stage',['VACA'])->count();
        $vacona = File_Animale::whereIn('stage',['VACONA'])->count();
        $vaconilla = File_Animale::whereIn('stage',['VACONILLA'])->count();
        $terneroH = File_Animale::where('sex','=','HEMBRA') ->whereIn('stage',['TERNERO'])->count();

        $data = [$toro,$torete,$terneroM,$vaca,$vacona,$vaconilla,$terneroH];
        $datas= json_encode($data);

        $macho = File_Animale::whereIn('sex',['MACHO'])->count();
        $hembra = File_Animale::whereIn('sex',['HEMBRA'])->count();

        $data2 = [$macho,$hembra];

        $datas2  = json_encode($data2);

        //return $datas;

        return view('dashboard.dashboard',compact('disponible','vendidos','reproduccion','total','datas','datas2'));
    }

    public function DashboardReproduccion(){
        $reproduccion = File_Animale::whereIn('actual_state',['REPRODUCCION'])->count();
        $reproduccionMachos = File_Animale::where('sex','=','MACHO') ->whereIn('actual_state',['REPRODUCCION'])->count();
        $reproduccionHembras = File_Animale::where('sex','=','HEMBRA') ->whereIn('actual_state',['REPRODUCCION'])->count();


        $data = [$reproduccion, $reproduccionMachos, $reproduccionHembras ];
        $datas = json_encode($data);


        $embarazosSi = File_Animale::whereIn('gestation_state',['SI'])->count();
        $embarazosNo = File_Animale::where('sex','=','HEMBRA') ->whereIn('gestation_state',['NO'])->count();
        $data2 = [$embarazosSi,$embarazosNo];
        $datas2 = json_encode($data2);

        return view('dashboard.reproduccion',compact('datas','datas2'));
    }

}


//SELECT COUNT( *) FROM `file_animale` WHERE `actual_state`='REPRODUCCION';