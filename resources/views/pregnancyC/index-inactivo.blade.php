@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Controles de Preñes Inactivos
@endsection
@section('boton_atras')
"{{url('/controlPrenes')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlPrenes-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlPrenes-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Control de Preñes Inactivos
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
                <center>
                    <a class="btn btn-primary" href="{{route('inactivos.controlPrenes.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.controlPrenes.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                        @method('DELETE') 
                        @csrf
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

