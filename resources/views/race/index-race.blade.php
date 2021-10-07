@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Razas Activos
@endsection

@section('boton_registro')
"{{url('confRaza/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Razas')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confRaza')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confRaza')}}"
@endsection

@section('nombre_tabla')
Registros de Razas Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de la Raza</th>
            <th>Porcentaje</th>
            <th>Estado actual de la Información</th> 
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($raza as $i)          
        <tr>
            <td >{{$i->race_d}}</td>
            <td>{{$i->percentage}}</td>
            <td >{{$i->actual_state}}</td>

            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('confRaza.edit',$i->id)}}" ><i class="fas fa-edit"></i></a> 
                </center>
               
            </td>  
            
        </tr>
        @endforeach
    </tbody>
   
</table>
@endsection
 
 