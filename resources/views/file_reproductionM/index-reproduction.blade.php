@extends('layouts.baseTablas')

@section('nombre_card')
Registros de Reproducción por Monta Natural Interna Activos
@endsection

@section('boton_registro')
"{{url('fichaReproduccionM/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/fichaReproduccionM')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaReproduccionM')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaReproduccionM')}}"
@endsection

@section('nombre_tabla')
Fichas de Reproducción por Monta Natural Interna Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal Hembra</th>
            <th>Raza </th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Código del Animal Macho</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($re_MI as $i)          
        <tr>
            <td>{{$i->fecha_MI}}</td>
            <td>{{$i->animal_h_MI}}</td>
            <td>{{$i->raza_h_MI}}</td>
            <td >{{$i->edad_h}}</td>
            <td >{{$i->sexo_h}}</td>
            <td>{{$i->animal_m_MI}}</td>
            <td>{{$i->raza_m_MI}}</td>
            <td>{{$i->edad_m}}</td>
            <td >{{$i->sexo_m}}</td>
            <td >{{$i->reproduction_state}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center> <a class="btn btn-primary  " href="{{route('fichaReproduccionM.edit',$i->id)}}" ><i class="fas fa-edit"></i></a></center>
                                        
            </td>  
        </tr>
        @endforeach 
    </tbody>
</table>

@endsection





