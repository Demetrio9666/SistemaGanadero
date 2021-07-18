@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
   
    @section('title')
 
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('confMate/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Raza</th>
                    <th>Tipo de Material Genetico</th>
                    <th>Proveedor</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($arti as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td >{{$i->raza}}</td>
                    <td>{{$i->reproduccion}}</td>
                    <td >{{$i->supplier}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('confMate.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('confMate.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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