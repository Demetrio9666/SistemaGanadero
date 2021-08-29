<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role_has_permissions;
use App\Http\Requests\StoreRole;
use Illuminate\Support\Facades\DB;

class Rolecontroller extends Controller
{
   
        public function __construct(){
                $this->middleware('can:rol.index')->only('index');
                $this->middleware('can:rol.create')->only('create','store');
                $this->middleware('can:rol.edit')->only('show','edit','update');
                $this->middleware('can:rol.destroy')->only('delete');
        }

    public function index()
    {
        $rol = Role::all();
        return view('admin.index-rol',compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $fichaAnimales = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[1,4])
                ->get();
        $fichaParto = DB::table('permissions')
               ->select('id','description')
                ->whereBetween('id',[5,8])
                ->get();
        
        $fichaTratamiento = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[9,12])
                ->get();
        $reproduccion = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[13,24])
                ->get();
        $controlVacuna = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[25,28])
                ->get();
        $controlPeso = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[29,32])
                ->get();
        $controlDesp= DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[33,36])
                ->get();
        $controlPrenes = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[37,40])
                ->get();
        $confDesp = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[41,44])
                ->get();
        $confVacuna= DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[45,48])
                ->get();
        $confVitamina = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[49,52])
                ->get();
        $confAntibiotico = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[53,56])
                ->get();
        $confMaterial = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[57,60])
                ->get();
        $confUbicacion = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[61,64])
                ->get();
        $confRaza = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[65,68])
                ->get();
        $dashboard = DB::table('permissions')
                ->select('id','description')
                ->where('id',69)
                ->get();
        $roles = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[70,73])
                ->get();
        $rolUsuario  = DB::table('permissions')
                ->select('id','description')
                ->where('id',74)
                ->get();
        $usuario  = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[75,78])
                ->get();
        $actividad  = DB::table('permissions')
                ->select('id','description')
                ->where('id',79)
                ->get();
        
        
        return view('admin.create-rol',compact('fichaAnimales','fichaParto','fichaTratamiento',
                    'reproduccion','controlVacuna','controlPeso','controlDesp','controlPrenes','confDesp','confVacuna','confVitamina',
                   'confAntibiotico','confMaterial','confMaterial','confUbicacion','confRaza','dashboard','roles','rolUsuario','usuario','actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        

        $rol = Role::create([
           'rol' =>$request->rol
        ]);
       // $rol->permissions()->attach($request->permiso);
        
       //se crea un nuevo rol
        //$role = Role::create([$request->rol]);
        //se asigna el permiso
        
        $rol->permissions()->sync($request->permissions);
        

        return redirect()->route('rol.index')->with('Infor','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
       
        
        return view('admin.edit-rol',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $rol)
    {
      
        $fichaAnimales = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[1,4])
                ->get();
        $fichaParto = DB::table('permissions')
        ->select('id','description')
                ->whereBetween('id',[5,8])
                ->get();

        $fichaTratamiento = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[9,12])
                ->get();
        $reproduccion = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[13,24])
                ->get();
        $controlVacuna = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[25,28])
                ->get();
        $controlPeso = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[29,32])
                ->get();
        $controlDesp= DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[33,36])
                ->get();
        $controlPrenes = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[37,40])
                ->get();
        $confDesp = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[41,44])
                ->get();
        $confVacuna= DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[45,48])
                ->get();
        $confVitamina = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[49,52])
                ->get();
        $confAntibiotico = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[53,56])
                ->get();
        $confMaterial = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[57,60])
                ->get();
        $confUbicacion = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[61,64])
                ->get();
        $confRaza = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[65,68])
                ->get();
        $dashboard = DB::table('permissions')
                ->select('id','description')
                ->where('id',69)
                ->get();
        $roles = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[70,73])
                ->get();
        $rolUsuario  = DB::table('permissions')
                ->select('id','description')
                ->where('id',74)
                ->get();
        $usuario  = DB::table('permissions')
                ->select('id','description')
                ->whereBetween('id',[75,78])
                ->get();
        $actividad  = DB::table('permissions')
                ->select('id','description')
                ->where('id',79)
                ->get();


        return view('admin.edit-rol',compact('fichaAnimales','fichaParto','fichaTratamiento',
                          'reproduccion','controlVacuna','controlPeso','controlDesp','controlPrenes','confDesp','confVacuna','confVitamina',
                          'confAntibiotico','confMaterial','confMaterial','confUbicacion','confRaza','dashboard','roles','rolUsuario','usuario','rol','actividad'));             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $rol)
    {
        $request->validate([
                'rol'=>'required',
                'permissions'=>'required',
            ]);
        $rol->update($request->all());
        $rol->permissions()->sync($request->permissions);
        return redirect()->route('rol.index')->with('Infor','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $rol)
    {
        
        $rol->delete();
        return redirect('/rol')->with('eliminar','ok');

    }
}
