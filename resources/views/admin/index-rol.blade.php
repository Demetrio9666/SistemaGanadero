@extends('layouts.baseTablas')

@section('nombre_card')
        Roles
@endsection

@section('boton_registro')
"{{url('rol/create')}}"
@endsection
@section('boton_reciclaje')
@endsection
@section('boton_reporte_excel')
@endsection
@section('boton_reporte_pdf')
@endsection

@section('nombre_tabla')
Registros de Roles
@endsection
@section('tabla')
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
@endsection




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