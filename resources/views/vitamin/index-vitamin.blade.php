@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Vitaminas Activos
@endsection

@section('boton_registro')
"{{url('confVi/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Vitaminas')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confVi')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confVi')}}"
@endsection

@section('nombre_tabla')
Registros de Vitaminas Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de la Vitamina</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($vitamina as $i)          
        <tr>
            <td>{{$i->vitamin_d}}</td>
            <td >{{$i->date_e}}</td>
            <td>{{$i->date_c}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('confVi.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>  
                </center>
                                    
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
