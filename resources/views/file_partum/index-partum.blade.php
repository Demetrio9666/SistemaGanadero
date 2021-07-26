@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
   
</head>
  <body>
    
    @section('title')
    
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaParto/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/fichaPartos')}}"><i class="fas fa-recycle"></i></a>
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="{{url('exportar-excel')}}"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="{{url('descarga-pdf')}}"><i class="fas fa-file-pdf"></i></a>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Fichas de Partos</h1></div>
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