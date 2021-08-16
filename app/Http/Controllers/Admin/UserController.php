<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUser;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use App\Model\User;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:usuarios.index')->only('index');
        $this->middleware('can:usuarios.create')->only('create','store');
        $this->middleware('can:usuarios.edit')->only('show','edit','update');
        $this->middleware('can:usuarios.destroy')->only('delete');
    }

    public function index()
    {
        $usuario = DB::table('users')
                ->select('id','name','email')
                ->get();
        return view('admin.usuarios.index',compact('usuario'));
       
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(StoreUser $request){
        $usuario = new User();

        $usuario->name = $request->nombreU;
        $usuario->email = $request->correoU;
        $usuario->password = bcrypt($request->password);
        $usuario->save(); 
        $usuario->roles()->sync([3]);

        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('CREAR');
        $actvividad->view ='REGISTRO USUARIO';

        $actvividad->data = $request->nombreU.'-'.$request->correoU;
        $actvividad->subject_type =(' App\Models\User');
        
        $actvividad->save();
       

        return redirect('/usuarios');

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

        //return redirect()->route('usuarios.index');
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ACTUALIZAR');
        $actvividad->view ='REGISTRO USUARIO';

        $actvividad->data = $usuario->name.'-'.$usuario->email;
        $actvividad->subject_type =(' App\Models\User');
        
        $actvividad->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id )
    {
        $usuario = User::findOrFail($id);
        $actvividad = new  Activity();
        $actvividad->log_name = $request->usuario;
        $actvividad->email = $request->correo;

        $super= str_replace('"','',$request->rol);
        $super2= str_replace('[','',$super);
        $super3= str_replace(']','',$super2);

        $actvividad->rol =$super3 ;
        $actvividad->subject_id =$request->id;
        $actvividad->description =('ELIMINAR');
        $actvividad->view ='REGISTRO USUARIO';

        $actvividad->data = $usuario->name.'-'.$usuario->email;
        $actvividad->subject_type =(' App\Models\User');
        
        $actvividad->save();
        $usuario->delete();
        return redirect('/usuarios')->with('eliminar','ok');
    }
}
