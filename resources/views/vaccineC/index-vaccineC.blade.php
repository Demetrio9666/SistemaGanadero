@extends('adminlte::page')
<head>
    @section('css')
       
    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlVacuna/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/controlVacunas')}}"><i class="fas fa-recycle"></i></a>
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
                    <td>{{$i->date}}</td>
                    <td >{{$i->animal}}</td>
                    <td >{{$i->vacuna}}</td>
                    <td >{{$i->date_r}}</td>
                    <td >{{$i->actual_state}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('controlVacuna.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                                
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
