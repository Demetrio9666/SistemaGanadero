@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlDesparasitacion/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/controlDesparasitaciones')}}"><i class="fas fa-recycle"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Desparasitación</th>
                    <th>Código del Animal</th>
                    <th>Desparasitante</th>
                    <th>Fecha de re-desparasitación</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($desC as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td >{{$i->animal}}</td>
                    <td>{{$i->des}}</td>
                    <td >{{$i->date_r}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('controlDesparasitacion.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                              
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
