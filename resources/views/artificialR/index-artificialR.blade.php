@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Materiales Genéticos Activas
@endsection

@section('boton_registro')
"{{url('confMate/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Materiales')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confMate')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confMate')}}"
@endsection

@section('nombre_tabla')
Registros de Materiales Genéticos Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
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
               <center><a class="btn btn-primary" href="{{route('confMate.edit',$i->id)}}" ><i class="fas fa-edit"></i></a></center> 
                                     
            </td>  
        </tr>
        @endforeach
    </tbody>
   
</table>
@endsection
