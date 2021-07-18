@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
   
</head>
  <body>
    
    @section('title')
    
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaParto/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de control</th>
                    <th>Código del Animal</th>
                    <th>Cant.Machos </th>
                    <th>Cant.Hembras</th>
                    <th>Cant.Muertos</th>
                    <th>Estado Animal</th>
                    <th>Tipo de Parto</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($par as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td>{{$i->animal}}</td>
                    <td >{{$i->male}}</td>
                    <td >{{$i->female}}</td>
                    <td >{{$i->dead}}</td>
                    <td >{{$i->mother_status}}</td>
                    <td >{{$i->partum_type}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary d-grid gap-2 d-md-block " href="{{route('fichaParto.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('fichaParto.destroy',$i->id)}}"  class="d-inline  formulario-eliminar  "  method="POST">
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