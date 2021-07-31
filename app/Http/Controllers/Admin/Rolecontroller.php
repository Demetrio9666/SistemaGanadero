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
                $this->middleware('can:Visualizar Roles')->only('index');
                $this->middleware('can:Crear      Roles')->only('create','store');
                $this->middleware('can:Editar     Roles')->only('show','edit','update');
                $this->middleware('can:Eliminar   Roles')->only('delete');
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
        
        //$permiso = Permission::all();
        $A = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[1,4])
                ->get();
        $P = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[5,8])
                ->get();
        $T = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[9,12])
                ->get();
        $R = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[13,24])
                ->get();
        $CV = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[25,28])
                ->get();
        $CP = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[29,32])
                ->get();
        $CD = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[33,36])
                ->get();
        $CPRE = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[37,40])
                ->get();
        $CDES = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[41,44])
                ->get();
        $CONFV = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[45,48])
                ->get();
        $CONFVI = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[49,52])
                ->get();
        $CONFAN = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[53,56])
                ->get();
        $CONFMG = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[57,60])
                ->get();
        $CONFU = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[61,64])
                ->get();
        $CONFRA = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[65,68])
                ->get();
        
        return view('admin.create-rol',compact('A','P','T','R','CV','CP','CD','CPRE','CDES','CONFV','CONFVI',
                    'CONFAN','CONFMG','CONFU','CONFRA'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'permissions'=>'required',
        ]);

        $role = Role::create([
           'name' =>$request->name
        ]);
       // $rol->permissions()->attach($request->permiso);
        
       //se crea un nuevo rol
       // $rol = Role::create([$request->Nombre_del_rol]);
        //se asigna el permiso
        
        $role->permissions()->sync($request->permissions);
        

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
      
                $A = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[1,4])
                ->get();
                $P = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[5,8])
                ->get();
                $T = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[9,12])
                ->get();
                $R = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[13,24])
                ->get();
                $CV = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[25,28])
                ->get();
                $CP = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[29,32])
                ->get();
                $CD = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[33,36])
                ->get();
                $CPRE = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[37,40])
                ->get();
                $CDES = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[41,44])
                ->get();
                $CONFV = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[45,48])
                ->get();
                $CONFVI = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[49,52])
                ->get();
                $CONFAN = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[53,56])
                ->get();
                $CONFMG = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[57,60])
                ->get();
                $CONFU = DB::table('permissions')
                ->select('id','name')
                ->whereBetween('id',[61,64])
                ->get();
                $CONFRA = DB::table('permissions')

                ->select('id','name')
                ->whereBetween('id',[65,68])
                ->get();
       
                return view('admin.edit-rol',compact('A','P','T','R','CV','CP','CD','CPRE','CDES','CONFV','CONFVI',
                'CONFAN','CONFMG','CONFU','CONFRA','rol'));

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
                'name'=>'required',
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
