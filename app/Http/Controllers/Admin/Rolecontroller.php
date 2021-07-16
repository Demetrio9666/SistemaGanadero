<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreRole;
use Illuminate\Support\Facades\DB;

class Rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

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
            'Nombre_del_rol'=>'required',
            'permiso'=>'required',
        ]);
        $rol = Role::create([
            'name' =>$request->Nombre_del_rol
        ]);

        $rol->permissions()->attach($request->permiso);


        return redirect('/rol')->with('Infor','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $permiso = Permission::all();
        return view('admin.edit-rol',compact('id','permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $id)
    {
        $permiso = Permission::all();
        //$rol = Role::findOrFail($id);
        return view('admin.edit-rol',compact('id','permiso'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect('/rol')->with('eliminar','ok');

    }
}
