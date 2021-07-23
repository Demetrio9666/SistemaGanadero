@extends('adminlte::page')
<head>
    @section('css')
        
    @endsection 
</head>
  <body>
    @section('title')
    @section('content_header')
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($usuario as $i)          
                <tr>
                    <td >{{$i->name}}</td>
                    <td>{{$i->email}}</td>
                
                    <td>
                        <a class="btn btn-primary" href="{{route('usuarios.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('usuarios.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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
