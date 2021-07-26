@extends('adminlte::page')
<head>
    @section('css')
       
    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('/controlVacuna')}}"><i class="fas fa-arrow-left"></i></a>
    
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Fichas de Controles de Vacunaciones</h1></div>
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th></th>
                    <th>Fecha de la Vacunación</th>
                    <th>Código del Animal</th>
                    <th>Vacuna</th>
                    <th>Fecha de re-vacunación</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($vacunaC as $i)          
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->date}}</td>
                    <td >{{$i->animal}}</td>
                    <td >{{$i->vacuna}}</td>
                    <td >{{$i->date_r}}</td>
                    <td >{{$i->actual_state}}</td>


                    <td>
                        <a class="btn btn-primary" href="{{route('inactivos.controlVacunas.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('inactivos.controlVacunas.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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
