@extends('layouts.baseTablas')

@section('nombre_card')
        Registros de Reproducción Artificial Activos
@endsection

@section('boton_registro')
"{{url('fichaReproduccionA/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/fichaReproduccionA')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaReproduccionA')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaReproduccionA')}}"
@endsection

@section('nombre_tabla')
Fichas de Reproducción Artificial Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Raza </th>
            <th>Tipo de Reproducción Artificial</th>
            <th>Raza Material Genético</th>
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($re_A as $i)          
        <tr>
            <td>{{$i->fecha_A}}</td>
            <td>{{$i->animalA}}</td>
            <td>{{$i->raza_h}}</td>
            <td >{{$i->tipo}}</td>
            <td >{{$i->raza_m}}</td>
            <td>{{$i->reproduction_state}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary  " href="{{route('fichaReproduccionA.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                </center>
                
                                        
            </td>  
        </tr>
        @endforeach 
</table>
@endsection



