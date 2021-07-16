@extends('adminlte::page')
<head>
    @section('css')
    @endsection 
</head>
  <body>
    
    @section('title')
   
    @section('content_header')
  
    <a type="button" class="btn-lg btn-success " style="margin: 10px" id="button-addon1" href="{{url('rol/create')}}"><i class="fas fa-plus-square"></i></a>
    <div class="card">
        <div class="card-body">
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
                    <td >{{$i->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('rol.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                        <form action="{{route('rol.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                            @csrf
                            @method('DELETE') 
                            <button type="submit"  class="btn btn-danger" value="Eliminar"  >
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
    @if (session('Infor')=='ok' )
    <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'EL ROL SE A GUARDADO ',
            showConfirmButton: false,
            timer: 1500
      })

    </script>

    @endif
    @endsection