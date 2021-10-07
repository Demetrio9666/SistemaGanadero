@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Controles de Desparasitaciones Inactivas
@endsection
@section('boton_atras')
"{{url('/controlDesparasitacion')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlDesparasitaciones-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlDesparasitaciones-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Controles de Desparasitaciones Inactivos
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
                <center>
                    <a class="btn btn-primary" href="{{route('inactivos.controlDesparasitaciones.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.controlDesparasitaciones.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                        @csrf
                        @method('DELETE') 
                        @include('layouts.base-usuario')
                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>  
                </center>
                                      
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection