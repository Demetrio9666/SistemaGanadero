@extends('layouts.baseTablasUsuario')

@section('nombre_card')
        Lista de Usuarios
@endsection

@section('boton_registro')
"{{url('usuarios/create')}}"
@endsection


@section('nombre_tabla')
Registros de Usuarios
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($usuario as $i)          
        <tr>
            <td >{{$i->name}}</td>
            <td>{{$i->email}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('usuarios.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('usuarios.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                        @csrf
                        @method('DELETE') 
                        @include('layouts.base-usuario')
                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                </center>
               
                </form>
            </td>  
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
