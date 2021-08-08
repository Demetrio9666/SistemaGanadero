@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Reproducción Artificial Inactivos
@endsection
@section('boton_atras')
"{{url('/fichaReproduccionA')}}"
@endsection
@section('nombre_tabla')
Fichas de Reproducción Artificial
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Raza </th>
            <th>Tipo de Reproducción Artificial</th>
            <th>Raza Material Genético</th>
            <th>Estado Actual</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($re_A as $i)          
        <tr>
            <td>{{$i->fecha_A}}</td>
            <td>{{$i->animalA}}</td>
            <td>{{$i->raza_h}}</td>
            <td >{{$i->tipo}}</td>
            <td >{{$i->raza_m}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <a class="btn btn-primary  " href="{{route('inactivos.fichaReproduccionA.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                @can('fichaReproduccionA.destroy')
                        <form action="{{route('inactivos.fichaReproduccionA.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                            @method('DELETE') 
                            @csrf
                            <button type="submit"  class="btn btn-danger" value="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>      
                @endcan
                                  
            </td>  
        </tr>
        @endforeach 
</table>
@endsection
