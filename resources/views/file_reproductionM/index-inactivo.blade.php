@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Reproducción por Monta Natural Interna Inactivo
@endsection
@section('boton_atras')
"{{url('/fichaReproduccionM')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaReproduccionM-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaReproduccionM-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Reproducción por Monta Natural Interna Inactivos
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
                <center>
                <a class="btn btn-primary  " href="{{route('inactivos.fichaReproduccionM.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                @can('fichaReproduccionM.destroy')
                <form action="{{route('inactivos.fichaReproduccionM.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                    @method('DELETE') 
                    @csrf
                    @include('layouts.base-usuario')
                    <button type="submit"  class="btn btn-danger" value="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form> 
                    
                @endcan    
                
            </center>
            </td>  
        </tr>
        @endforeach 

    </tbody>
    
</table>

@endsection
