@extends('layouts.baseTablas')

@section('nombre_card')
        Registros de Controles de Vacunaciones Activos
@endsection

@section('boton_registro')
"{{url('controlVacuna/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/controlVacunas')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlVacuna')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlVacuna')}}"
@endsection

@section('nombre_tabla')
Fichas de Controles de Vacunaciones Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            
            <th>Fecha de la Vacunación</th>
            <th>Código del Animal</th>
            <th>Vacuna</th>
            <th>Fecha de próxima dosis</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($vacunaC as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td >{{$i->vacuna}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>

            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('controlVacuna.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                </center>
              
                                        
            </td>  
        </tr>
        @endforeach
    </tbody>
   
</table>
@endsection
