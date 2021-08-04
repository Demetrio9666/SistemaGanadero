@extends('layouts.baseTablas')

@section('nombre_card')
        Registros de Controles de Pesos Activos
@endsection

@section('boton_registro')
"{{url('controlPeso/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/controlPesos')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlPeso')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlPeso')}}"
@endsection
@section('nombre_tabla')
Fichas de Controles de Pesos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Peso</th>
            <th>Fecha de próximo control</th>
            <th>Estado Actual</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($pesoC as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td >{{$i->weigtht}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('controlPeso.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>                      
            </td>  
        </tr>
        @endforeach
    </tbody>

</table>
@endsection
