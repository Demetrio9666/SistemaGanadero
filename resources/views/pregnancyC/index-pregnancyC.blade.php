@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Controles de Preñes Activos
@endsection

@section('boton_registro')
"{{url('controlPrenes/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/controlPrenes')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlPrenes')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlPrenes')}}"
@endsection

@section('nombre_tabla')
Fichas de Control de Preñes Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de control</th>
            <th>Código del Animal</th>
            <th>Vitamina </th>
            <th>Alternativa</th>
            <th>Alternativa</th>
            <th>Observación</th>
            <th>Fecha de próximo control</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pre as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td>{{$i->animal}}</td>
            <td >{{$i->vitamina}}</td>
            <td >{{$i->alt1}}</td>
            <td >{{$i->alt2}}</td>
            <td >{{$i->observation}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
               <center><a class="btn btn-primary " href="{{route('controlPrenes.edit',$i->id)}}" ><i class="fas fa-edit"></i></a></center> 
                                         
            </td>  
        </tr>
        @endforeach 

    </tbody>
</table>
@endsection