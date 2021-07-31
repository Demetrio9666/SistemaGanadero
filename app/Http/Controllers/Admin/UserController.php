<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use App\Model\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:Visualizar Usuarios')->only('index');
       // $this->middleware('can:Crear      Usuarios')->only('create','store');
        $this->middleware('can:Editar Usuarios')->only('show','edit','update');
        $this->middleware('can:Eliminar Usuarios')->only('delete');
    }

    public function index()
    {
        $usuario = DB::table('users')
                ->select('id','name','email')
                ->get();
        return view('admin.usuarios.index',compact('usuario'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('admin.usuarios.edit',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario )
    {
        $roles = Role::all();
        //$usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario )
    {
        $usuario->roles()->sync($request->roles);

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        //
    }
}
