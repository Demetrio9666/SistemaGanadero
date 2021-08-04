@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Ubicaciones Activas
@endsection

@section('boton_registro')
"{{url('confUbicacion/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Ubicaciones')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confUbicacion')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confUbicacion')}}"
@endsection

@section('nombre_tabla')
Registros de Ubicaciones
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de ubicación</th>
            <th>Descripción</th>
            <th>Estado Actual</th> 
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
                <a class="btn btn-primary" href="{{route('confUbicacion.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                        
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
