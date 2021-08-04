@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Materiales Genéticos Inactivas
@endsection
@section('boton_atras')
"{{url('/confMate')}}"
@endsection
@section('nombre_tabla')
Registros de Materiales
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado Actual</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($arti as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->raza}}</td>
            <td>{{$i->reproduccion}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('inactivos.Materiales.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                <form action="{{route('inactivos.Materiales.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                    @csrf
                    @method('DELETE') 
                    <button type="submit"  class="btn btn-danger" value="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>                         
            </td>  
        </tr>
        @endforeach
    </tbody> 
</table>
@endsection
