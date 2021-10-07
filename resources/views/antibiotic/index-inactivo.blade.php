@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Antibióticos Inactivas
@endsection
@section('boton_atras')
"{{url('/confAnt')}}"
@endsection
@section('boton_reporte_excel')
"{{url('/exportar-excel-Antibioticos-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('/descarga-pdf-Antibioticos-Inactivos')}}"
@endsection
@section('nombre_tabla')
Registros de Antibióticos Inactivos
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
                    <a class="btn btn-primary" href="{{route('inactivos.Antibioticos.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.Antibioticos.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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
</table>
@endsection
