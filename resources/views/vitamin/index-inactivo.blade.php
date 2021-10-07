@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Vitaminas Inactivos
@endsection
@section('boton_atras')
"{{url('/confVi')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-Vitaminas-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-Vitaminas-Inactivos')}}"
@endsection
@section('nombre_tabla')
Registros de Vitaminas Inactivos
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
                    <a class="btn btn-primary" href="{{route('inactivos.Vitaminas.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.Vitaminas.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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