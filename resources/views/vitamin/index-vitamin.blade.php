@extends('adminlte::page')
<head>
    @section('css')
        
    @endsection 
</head>
  <body>
   
    @section('title')
   
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('confVi/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Nombre de la Vitamina</th>
                    <th>Fecha Elaboración</th>
                    <th>Fecha Caducidad </th>
                    <th>Proveedor</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($vitamina as $i)          
                <tr>
                    <td>{{$i->vitamin_d}}</td>
                    <td >{{$i->date_e}}</td>
                    <td>{{$i->date_c}}</td>
                    <td >{{$i->supplier}}</td>
                    <td >{{$i->actual_state}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('confVi.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('confVi.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
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
