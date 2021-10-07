@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Antibióticos Activas
@endsection

@section('boton_registro')
"{{url('confAnt/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/Antibioticos')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-confAnt')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-confAnt')}}"
@endsection

@section('nombre_tabla')
Registros de Antibióticos Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre del Antibiótico</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($anti as $i)          
        <tr>
            <td>{{$i->antibiotic_d}}</td>
            <td >{{$i->date_e}}</td>
            <td>{{$i->date_c}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('confAnt.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                </center>
               
                                      
            </td>  
        </tr>
        @endforeach
   
</table>
@endsection
