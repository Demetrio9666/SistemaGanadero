<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RazaController extends Controller
{    ///este es el indix muestra tabla

   
    public function index(){//vista principal
        $raza = Race::all();
        return view('conf.confRaza',compact('raza'));
    }

    public function create(){///vista del formulario 
        return view('f-raza.Raza');
    }

    public function store(Request $request){//ruta donde se envia los datos bd
       $raza = new Race();
        
       $raza->description = $request->description;
       $raza->percentage = $request->percentage;
       $raza->save(); 
       
       //return redirect()->route();
       return redirect('/confRaza');
        
    }

    public function show(Race $id){
      return view('f-raza.Raza-edit',compact('id'));
    }

    public function edit($id){
        $raza = Race::find($id);
        //return view('f-raza.Raza-edit', compact('raza'));
        return $raza;
    }
   
  

    



}
