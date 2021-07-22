@extends('adminlte::page')

<head>
    @section('css')
        
    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaTratamiento/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/fichaTratamientos')}}"><i class="fas fa-recycle"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Tratamiento</th>
                    <th>Código del Animal</th>
                    <th>Enfermedad </th>
                    <th>Detalle</th>
                    <th>Antibiótico</th>
                    <th>Vitamina</th>
                    <th>Tratamiento</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tra as $i)          
                <tr>
                    <td>{{$i->date}}</td>
                    <td>{{$i->animal}}</td>
                    <td>{{$i->disease}}</td>
                    <td >{{$i->detail}}</td>
                    <td >{{$i->anti}}</td>
                    <td >{{$i->vi}}</td>
                    <td >{{$i->treatment}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary  " href="{{route('fichaTratamiento.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                                
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