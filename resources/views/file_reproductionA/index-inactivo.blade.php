@extends('adminlte::page')
<head>
    @section('css')
    @endsection 
</head>
<body>
    @section('title')
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('/fichaReproduccionA')}}"><i class="fas fa-arrow-left"></i></a>
        
            <div class="accordion-body">
                <div class="card">
                    <h1 style="margin: 15px">Artificial</h1>
                    <div class="card-body">
                      <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>             
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Código del Animal</th>
                                <th>Raza </th>
                                <th>Tipo de Reproduccion Artificial</th>
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
                                    <a class="btn btn-primary  " href="{{route('inactivos.fichaReproduccionA.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                    <form action="{{route('inactivos.fichaReproduccionA.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                                        @method('DELETE') 
                                        @csrf
                                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>                         
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