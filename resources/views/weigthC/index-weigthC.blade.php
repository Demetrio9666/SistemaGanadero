@extends('adminlte::page')
<head>
    @section('css')
    @endsection 
</head>
  <body>
    
    @section('title')
    
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlPeso/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    
                    <th>Fecha de Registro</th>
                    <th>Código del Animal</th>
                    <th>Peso</th>
                    <th>Fecha de próximo control</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($pesoC as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td >{{$i->animal}}</td>
                    <td >{{$i->weigtht}}</td>
                    <td >{{$i->date_r}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('controlPeso.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('controlPeso.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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
</body>
@section('js')    
@endsection
