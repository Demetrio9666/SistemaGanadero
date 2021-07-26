@extends('adminlte::page')
<head>
    @section('css')
   
    @endsection 
</head>
<body>

    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaReproduccionA/create')}}"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('inactivos/fichaReproduccionA')}}"><i class="fas fa-recycle"></i></a>
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="{{url('exportar-excel')}}"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="{{url('descarga-pdf')}}"><i class="fas fa-file-pdf"></i></a>    
            <div class="accordion-body">
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Reproducción Artificial</h1></div>
                      <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>             
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Código del Animal</th>
                                <th>Raza </th>
                                <th>Tipo de Reproducción Artificial</th>
                                <th>Raza Material Genético</th>
                                <th>Estado Actual</th> 
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($re_A as $i)          
                            <tr>
                                <td>{{$i->fecha_A}}</td>
                                <td>{{$i->animalA}}</td>
                                <td>{{$i->raza_h}}</td>
                                <td >{{$i->tipo}}</td>
                                <td >{{$i->raza_m}}</td>
                                <td >{{$i->actual_state}}</td>
                                <td>
                                    <a class="btn btn-primary  " href="{{route('fichaReproduccionA.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                                            
                                </td>  
                            </tr>
                            @endforeach 
                    </table>
                    </div>
                
            </div>
          </div>


    @endsection

</body>
@section('js')

@endsection




