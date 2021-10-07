@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Desparasitante Activas
@endsection

@section('boton_registro')
"{{url('confDespa/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Desparasitantes')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confDespa')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confDespa')}}"
@endsection

@section('nombre_tabla')
Registros de Desparasitantes Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre del Desparasitante</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($desp as $i)          
        <tr>
            <td>{{$i->dewormer_d}}</td>
            <td >{{$i->date_e}}</td>
            <td>{{$i->date_c}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('confDespa.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                </center>                    
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

