@extends('adminlte::page')
<head>
    @section('css')
       
    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlVacuna/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th></th>
                    <th>Fecha de la Vacunacion</th>
                    <th>Código del Animal</th>
                    <th>Vacuna</th>
                    <th>Fecha de re-vacunacion</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($vacunaC as $i)          
                <tr>
                    <td>{{$i->id}}</td>
                    <td>{{$i->date_vaccine}}</td>
                    <td >{{$i->animal}}</td>
                    <td >{{$i->vacuna}}</td>
                    <td >{{$i->date_vr}}</td>
                    <td >{{$i->actual_state}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('controlVacuna.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('controlVacuna.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                            @method('DELETE') 
                            @csrf
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
