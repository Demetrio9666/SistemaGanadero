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
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="{{url('exportar-excel')}}"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="{{url('descarga-pdf')}}"><i class="fas fa-file-pdf"></i></a>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Fichas de Controles de Vacunaciones</h1></div>
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    
                    <th>Fecha de la Vacunación</th>
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
