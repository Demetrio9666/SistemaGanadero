@extends('adminlte::page')

@section('content_header')
<label>Hora:</label>
<br>
<div id="reloj" class="reloj">00 : 00 : 00</div>
<br>
<br>
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book-open"></i>
                Roles</h3>
            </div>
            <div class="col-lg-3 col-6">
                    <a type="button" title="Agregar nuevo registro" class="btn btn-success " style="margin: 10px" id="button-addon1" href="{{url('rol/create')}}"><i class="fas fa-plus-square"></i></a>
                    
            </div>
            <div class="card">
                <div class="card-body">
                        <div class="titulo "><h1> Registros de Roles</h1></div>
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>             
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($rol as $i)          
                                <tr >
                                    <td>{{$i->id}}</td>
                                    <td >{{$i->rol}}</td>
                                    <td>
                                        <center>
                                            <a class="btn btn-primary" href="{{route('rol.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                            <form action="{{route('rol.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                                                @csrf
                                                @method('DELETE') 
                                                @include('layouts.base-usuario')
                                                <button type="submit"  class="btn btn-danger" value="Eliminar"  >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                        </center>
                                       
                                        </form>                         
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        @yield('usuario')
                </div>
            </div>
        </div>
@endsection
@section('js')
@if (session('Infor')=='ok' )
<script>
        Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'El rol se guardo',
        showConfirmButton: false,
        timer: 1500
  })

</script>
@endif