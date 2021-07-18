@extends('adminlte::page')
<head>
    @section('css')
     
    @endsection 
</head>
  <body>
   
    @section('title')

    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaReproduccionEx/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Codigo Animal</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Codigo Externo</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Hacienda</th>
                    <th>Estado Actual</th> 
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
                    <td >{{$i->actual_state}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('fichaReproduccionEx.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('fichaReproduccionEx.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                            @csrf
                            @method('DELETE') 
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
</body>
    @section('js')
          
    @endsection
