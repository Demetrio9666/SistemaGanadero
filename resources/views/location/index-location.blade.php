@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('confUbicacion/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
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
                        <a class="btn btn-primary" href="{{route('confUbicacion.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('confUbicacion.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                            @csrf
                            @method('DELETE') 
                            <input type="submit"  class="btn btn-danger" value="Eliminar">
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
