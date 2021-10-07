@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Razas Inactivos
@endsection
@section('boton_atras')
"{{url('/confRaza')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-Razas-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-Razas-Inactivos')}}"
@endsection
@section('nombre_tabla')
Registros de Razas Inactivos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de la Raza</th>
            <th>Porcentaje</th>
            <th>Estado actual de la Información</th> 
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($raza as $i)          
        <tr>
            <td >{{$i->race_d}}</td>
            <td>{{$i->percentage}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('inactivos.Razas.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                <form action="{{route('inactivos.Razas.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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
