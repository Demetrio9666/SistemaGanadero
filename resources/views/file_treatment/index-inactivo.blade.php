@extends('layouts.baseTablasInactivas')

@section('nombre_card')
        Registros de Tratamientos Inactivos
@endsection
@section('boton_atras')
"{{url('/fichaTratamiento')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaTratamientos-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaTratamientos-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Tratamientos Inactivos
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
                <td >{{$i->detail}}</td>
                <td >{{$i->anti}}</td>
                <td >{{$i->vi}}</td>
                <td >{{$i->treatment}}</td>
                <td>{{$i->recovery}}</td>
                <td >{{$i->actual_state}}</td>
                <td>
                    <a class="btn btn-primary  " href="{{route('inactivos.fichaTratamientos.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                    <form action="{{route('inactivos.fichaTratamientos.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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

