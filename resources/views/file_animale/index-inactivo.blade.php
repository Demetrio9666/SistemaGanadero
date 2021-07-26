@extends('adminlte::page')
<head>
        @section('css')
       
        @endsection 
</head>
    @section('content_header')
                <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('/fichaAnimal')}}"><i class="fas fa-arrow-left"></i></a>
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Animales</h1></div>
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>             
                                <tr>
                                    <th>Código Animal</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Raza</th>
                                    <th>Sexo</th>
                                    <th>Etapa</th>
                                    <th>Origen</th>
                                    <th>Edad-meses</th>
                                    <th>Salud</th>
                                    <th>Embarazo</th>
                                    <th>localización</th>
                                    <th>Estado Actual</th> 
                                    <th>Concebido</th>  
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($animal as $i)          
                                <tr>
                                    <td>{{$i->animalCode}}</td>
                                    <td >{{$i->date}}</td>
                                    <td >{{$i->raza}}</td>
                                    <td >{{$i->sex}}</td>
                                    <td >{{$i->stage}}</td>
                                    <td >{{$i->source}}</td>
                                    <td >{{$i->age_month}}</td>
                                    <td >{{$i->health_condition}}</td>
                                    <td >{{$i->gestation_state}}</td>
                                    <td >{{$i->ubicacion}}</td>
                                    <td >{{$i->actual_state}}</td>
                                    <td >{{$i->conceived}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('inactivos.fichaAnimales.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                        <form action="{{route('inactivos.fichaAnimales.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                                            @method('DELETE') 
                                            @csrf
                                            <button type="submit"  class="btn btn-danger" value="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>                         
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    @endsection

@section('js')
            
@endsection
