@extends('adminlte::page')
<head>
    @section('css')
       
    @endsection 
</head>

   
    @section('title')
     
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlPrenes/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/controlPrenes')}}"><i class="fas fa-recycle"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de control</th>
                    <th>Código del Animal</th>
                    <th>Vitamina </th>
                    <th>Alternativa 1</th>
                    <th>Alternativa 2</th>
                    <th>Observación</th>
                    <th>Fecha de próximo control</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pre as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td>{{$i->animal}}</td>
                    <td >{{$i->vitamina}}</td>
                    <td >{{$i->alt1}}</td>
                    <td >{{$i->alt2}}</td>
                    <td >{{$i->observation}}</td>
                    <td >{{$i->date_r}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary d-grid gap-2 d-md-block " href="{{route('controlPrenes.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                                 
                    </td>  
                </tr>
                @endforeach 
       
            </tbody>
        </table>
        </div>
    </div>
    @endsection

   
@endsection