@extends('adminlte::page')
<head>
    @section('css')
    <link href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
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
            <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
            <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script>
       $('#tabla').DataTable({
         responsive: true,
         "language": {
            "lengthMenu": "Mostrar "+
            `<select class="custom-select custom-selec-sm form-control form-control-sm">
                    <option value = '10' >10</option> 
                    <option  value = '25' >25</option>
                    <option  value = '50' >50</option>
                    <option  value = '100' >100</option>
                    <option  value =  '-1'>All</option>
            </select>`
            +" Registro por Pagina",
            "zeroRecords": "Resultados No encontrados -Disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de  _MAX_ Registros Totales)",
            'search': "Buscar:",
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
       });
    </script>
    @if (session('eliminar') == 'ok')
    <script>
         Swal.fire(
                    '¡Eliminado!',
                    'El registro fue eliminado.',
                    'success'
                    )      
    </script>
@endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
          Swal.fire({
                    title: 'Está seguro?',
                    text: "Este registro se eliminara definitivamente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Eliminar!',
                    concelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
        }) 
    });
</script>


@endsection



