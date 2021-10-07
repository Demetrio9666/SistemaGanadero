@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Controles de Desparasitaciones Activas
@endsection

@section('boton_registro')
"{{url('controlDesparasitacion/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/controlDesparasitaciones')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlDesparasitacion')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlDesparasitacion')}}"
@endsection

@section('nombre_tabla')
Ficha de Controles de Desparasitaciones Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Desparasitación</th>
            <th>Código del Animal</th>
            <th>Desparasitante</th>
            <th>Fecha de próxima dosis</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($desC as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td>{{$i->des}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
               <center><a class="btn btn-primary" href="{{route('controlDesparasitacion.edit',$i->id)}}" ><i class="fas fa-edit"></i></a></center> 
                                      
            </td>  
        </tr>
        @endforeach
    </tbody>
    
</table>
@endsection


