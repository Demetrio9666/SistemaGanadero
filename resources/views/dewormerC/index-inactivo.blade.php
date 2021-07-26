@extends('adminlte::page')
<head>
    @section('css')

    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="{{url('/controlDesparasitacion')}}"><i class="fas fa-arrow-left"></i></a>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Registros de Control de Desparacitaciones</h1></div>
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
                        <a class="btn btn-primary" href="{{route('inactivos.controlDesparasitaciones.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('inactivos.controlDesparasitaciones.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                            @csrf
                            @method('DELETE') 
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