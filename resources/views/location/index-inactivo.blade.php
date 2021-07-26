@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('/confUbicacion')}}"><i class="fas fa-arrow-left"></i></a>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Registros de Ubicaciones</h1></div>
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Nombre de ubicación</th>
                    <th>Descripción</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($ubicacion as $i)          
                <tr>
                    <td>{{$i->location_d}}</td>
                    <td >{{$i->description}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('inactivos.Ubicaciones.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('inactivos.Ubicaciones.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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
