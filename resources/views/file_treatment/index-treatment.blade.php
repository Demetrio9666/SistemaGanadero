@extends('layouts.baseTablas')

@section('nombre_card')
        Registros de Tratamientos Activos
@endsection

@section('boton_registro')
"{{url('fichaTratamiento/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/fichaTratamientos')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaTratamiento')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaTratamiento')}}"
@endsection

@section('nombre_tabla')
Fichas de Tratamientos Activos
@endsection
@section('tabla')
        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Tratamiento</th>
                    <th>Código del Animal</th>
                    <th>Enfermedad </th>
                    <th>Detalle</th>
                    <th>Antibiótico</th>
                    <th>Vitamina</th>
                    <th>Tratamiento</th>
                    <th>Recuperación</th>
                    <th>Estado actual de la Información</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tra as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td>{{$i->animal}}</td>
                    <td>{{$i->disease}}</td>
                    <td>{{$i->detail}}</td>
                    <td>{{$i->anti}}</td>
                    <td>{{$i->vi}}</td>
                    <td>{{$i->treatment}}</td>
                    <td>{{$i->recovery}}</td>
                    <td>{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary  " href="{{route('fichaTratamiento.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>                      
                    </td>  
                </tr>
                @endforeach 
            </tbody>
        </table>
@endsection