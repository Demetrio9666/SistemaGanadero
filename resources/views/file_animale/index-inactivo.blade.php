@extends('layouts.baseTablasInactivas')

@section('nombre_card')
         Registros Inactivos
@endsection
@section('boton_atras')
"{{url('/fichaAnimal')}}"
@endsection
@section('boton_reporte_excel')
"{{url('/exportar-excel-fichaAnimal-Inactivos')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('/descarga-pdf-fichaAnimal-Inactivos')}}"
@endsection
@section('nombre_tabla')
Fichas de Animales Inactivos
@endsection
@section('tabla')
        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Código Animal</th>
                    <th>Foto</th>
                    <th>Fecha Nacimiento</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Etapa</th>
                    <th>Origen</th>
                    <th>Edad-meses</th>
                    <th>Salud</th>
                    <th>Embarazo</th>
                    <th>Estado Actual</th> 
                    <th>localización</th>
                    <th>Concebido</th>  
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($animal as $i)          
                <tr>
                    <td>{{$i->animalCode}}</td>
                    <td>
                        <img src="{{asset($i->url)}}" width="50px"  height="50px">
                    </td>
                    <td >{{$i->date}}</td>
                    <td >{{$i->raza}}</td>
                    <td >{{$i->sex}}</td>
                    <td >{{$i->stage}}</td>
                    <td >{{$i->source}}</td>
                    <td >{{$i->age_month}}</td>
                    <td >{{$i->health_condition}}</td>
                    <td >{{$i->gestation_state}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td >{{$i->ubicacion}}</td>
                    <td >{{$i->conceived}}</td>
                    <td>
                        <center>
                            <a class="btn btn-primary" href="{{route('inactivos.fichaAnimales.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                            
                            <form action="{{route('inactivos.fichaAnimales.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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