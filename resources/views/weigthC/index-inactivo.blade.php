@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Controles de Pesos Inactivos
@endsection
@section('boton_atras')
"{{url('/controlPeso')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-controlPesos-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-controlPesos-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Controles de Pesos Inactivos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Peso</th>
            <th>Fecha de próximo control</th>
            <th>Estado actual de la Información</th> 
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
                <a class="btn btn-primary" href="{{route('inactivos.controlPesos.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                <form action="{{route('inactivos.controlPesos.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                    @method('DELETE') 
                    @csrf
                    @include('layouts.base-usuario')
                    <button type="submit"  class="btn btn-danger" value="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>                         
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection