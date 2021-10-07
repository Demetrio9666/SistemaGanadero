@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Desparacitantes Activas
@endsection
@section('boton_atras')
"{{url('/confDespa')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-Desparasitantes-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-Desparasitantes-Inactivos')}}"
@endsection
@section('nombre_tabla')
Registros de Desparasitantes Inactivos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre del Desparasitante</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($desp as $i)          
        <tr>
            <td>{{$i->dewormer_d}}</td>
            <td >{{$i->date_e}}</td>
            <td>{{$i->date_c}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('inactivos.Desparasitantes.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.Desparasitantes.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                        @csrf
                        @method('DELETE') 
                        @include('layouts.base-usuario')
                        <button type="submit"  class="btn btn-danger" value="Eliminar"  >
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
