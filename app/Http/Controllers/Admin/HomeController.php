<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function Dashboard(){
        return view('admin.index');
    }
    public function welcome(){
        return view('teams.welcome');
    }


    public function Registro_Animal(){
        return view('registro.fichaAnimal');
    }
    public function Registro_Parto(){ 
        return view('registro.fichaParto');
    }
    public function Registro_Tratamiento(){
        return view('registro.fichaTratamiento');
    }
    public function Registro_Reproduccion(){
        return view('registro.fichaReproduccion');
    }


    
    public function Control_Despara(){
        return view('controles.controlDesparasitacion');
    }
    public function Control_Peso(){
        return view('controles.controlPeso');
    }
    public function Control_Prenes(){
        return view('controles.controlPrenes');
    }
    public function Control_Vacuna(){
        return view('controles.controlVacuna');
    }


    public function Conf_Vacuna(){
        return view('conf.confVacuna');
    }
    public function Conf_Ubicacion(){
        return view('conf.confUbicacion');
    }
    public function Conf_Desparacitante(){
        return view('conf.confDesparasitante');
    }
    public function Conf_Pajuela(){
        return view('conf.confMaterial');
    }
    public function Conf_Antibiotico(){
        return view('conf.confAntibiotico');
    }
    public function Conf_Vitamina(){
        return view('conf.confVitamina');
    }
 
   

}
