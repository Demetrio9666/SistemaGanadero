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
    public function Dashboard(){
    
        $disponible = File_Animale::whereIn('actual_state',['DISPONIBLE'])->count();
        $vendidos = File_Animale::whereIn('actual_state',['VENDIDO'])->count();
        $reproduccion = File_Animale::whereIn('actual_state',['REPRODUCCION'])->count();
        $total = File_Animale::whereIn('actual_state',['DISPONIBLE','REPRODUCCION','VENDIDO'])->count();

        return view('dashboard.dashboard',compact('disponible','vendidos','reproduccion','total'));
    }
}


//SELECT COUNT( *) FROM `file_animale` WHERE `actual_state`='REPRODUCCION';