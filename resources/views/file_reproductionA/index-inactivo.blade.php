@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Reproducción Artificial Inactivos
@endsection
@section('boton_atras')
"{{url('/fichaReproduccionA')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaReproduccionA-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaReproduccionA-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Reproducción Artificial Inactivos
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
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th>
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
            <td>{{$i->reproduction_state}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                <a class="btn btn-primary  " href="{{route('inactivos.fichaReproduccionA.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                @can('fichaReproduccionA.destroy')
                        <form action="{{route('inactivos.fichaReproduccionA.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                            @method('DELETE') 
                            @csrf
                            @include('layouts.base-usuario')
                            <button type="submit"  class="btn btn-danger" value="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>      
                @endcan
                    </center>         
            </td>  
        </tr>
        @endforeach 
</table>
@endsection
