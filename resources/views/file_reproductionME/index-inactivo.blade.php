@extends('layouts.baseTablasInactivas')

@section('nombre_card')
Registros de Reproducción por Monta Natural Externas Inactivos
@endsection
@section('boton_atras')
"{{url('/fichaReproduccionEx')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaReproduccionEx-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaReproduccionEx-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Reproducción por Monta Natural Externa Inactivos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Codigo Animal</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Código Externo</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Hacienda</th>
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th>  
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($ext as $i)          
        <tr>
            <td >{{$i->date}}</td>
            <td>{{$i->animalCode}}</td>
            <td>{{$i->raza}}</td>
            <td>{{$i->edad}}</td>
            <td>{{$i->sexo}}</td>
            <td>{{$i->animalCode_Exte}}</td>
            <td>{{$i->race_d}}</td>
            <td>{{$i->age_month}}</td>
            <td>{{$i->sex}}</td>
            <td>{{$i->hacienda_name}}</td>
            <td >{{$i->reproduction_state}}</td>
            <td >{{$i->actual_state}}</td>
            <td>
              <center>
                <a class="btn btn-primary" href="{{route('inactivos.fichaReproduccionEx.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                @can('fichaReproduccionEx.destroy')
                <form action="{{route('inactivos.fichaReproduccionEx.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                    @csrf
                    @method('DELETE') 
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















   