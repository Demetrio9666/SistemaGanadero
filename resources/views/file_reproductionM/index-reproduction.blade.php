@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaReproduccionM/create')}}"><i class="fas fa-plus-square"></i></a>

                <div class="card">
                    <h1 style="margin: 15px">Monta Interna</h1>
                    <div class="card-body">
                      <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>             
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Código del Animal</th>
                                <th>Raza </th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Código del Animal</th>
                                <th>Raza</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado Actual</th> 
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($re_MI as $i)          
                            <tr>
                                <td>{{$i->fecha_MI}}</td>
                                <td>{{$i->animal_h_MI}}</td>
                                <td>{{$i->raza_h_MI}}</td>
                                <td >{{$i->edad_h}}</td>
                                <td >{{$i->sexo_h}}</td>
                                <td>{{$i->animal_m_MI}}</td>
                                <td>{{$i->raza_m_MI}}</td>
                                <td>{{$i->edad_m}}</td>
                                <td >{{$i->sexo_m}}</td>
                                <td >{{$i->actual_state}}</td>
                                <td>
                                    <a class="btn btn-primary  " href="{{route('fichaReproduccionM.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                    <form action="{{route('fichaReproduccionM.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                                        @method('DELETE') 
                                        @csrf
                                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
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



