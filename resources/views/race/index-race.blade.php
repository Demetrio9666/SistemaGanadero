 @extends('adminlte::page')
<head>
    @section('css')
        
    @endsection 
</head>
  <body>
   
    @section('title')
  
    
  
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('confRaza/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/Razas')}}"><i class="fas fa-recycle"></i></a>
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="{{url('exportar-excel')}}"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="{{url('descarga-pdf')}}"><i class="fas fa-file-pdf"></i></a>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Registros de Razas</h1></div>
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Nombre de la Raza</th>
                    <th>Porcentaje</th>
                    <th>Estado Actual</th> 
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($raza as $i)          
                <tr>
                    <td >{{$i->race_d}}</td>
                    <td>{{$i->percentage}}</td>
                    <td >{{$i->actual_state}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{route('confRaza.edit',$i->id)}}" ><i class="fas fa-edit"></i></a> 
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
