@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Ubicaciones Inactivos
@endsection
@section('boton_atras')
"{{url('/confUbicacion')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-Ubicaciones-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-Ubicaciones-Inactivos')}}"
@endsection
@section('nombre_tabla')
Registros de Ubicaciones Inactivos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de ubicación</th>
            <th>Descripción</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($ubicacion as $i)          
        <tr>
            <td>{{$i->location_d}}</td>
            <td >{{$i->description}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('inactivos.Ubicaciones.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.Ubicaciones.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                        @csrf
                        @method('DELETE') 
                        @include('layouts.base-usuario')
                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>       
                </center>
                                 
            </td>  
        </tr>
        @endforeach
    </tbody>   
</table>
@endsection
