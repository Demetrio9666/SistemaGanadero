@extends('adminlte::page')
<head>
    @section('css')
        <link href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('datatables/responsive.bootstrap4.min.css')}}">
    @endsection 
</head>
  <body>
   
    @section('title')
     
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('controlPrenes/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="ubicaciont" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de control</th>
                    <th>Código del Animal</th>
                    <th>Vitamina </th>
                    <th>Alternativa 1</th>
                    <th>Alternativa 2</th>
                    <th>Observación</th>
                    <th>Fecha de próximo control</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pre as $i)          
                <tr>
                    <td>{{$i->date_c}}</td>
                    <td>{{$i->animal}}</td>
                    <td >{{$i->vitamina}}</td>
                    <td >{{$i->alt1}}</td>
                    <td >{{$i->alt2}}</td>
                    <td >{{$i->observation}}</td>
                    <td >{{$i->date_rc}}</td>
                    <td>
                        <a class="btn btn-primary d-grid gap-2 d-md-block " href="{{route('controlPrenes.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('controlPrenes.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
                            @method('DELETE') 
                            @csrf
                            <input type="submit"  class="btn btn-danger" value="Eliminar">
                        </form>                         
                    </td>  
                </tr>
                @endforeach 
       
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha de control</th>
                    <th>Código del Animal</th>
                    <th>Vitamina </th>
                    <th>Alternativa 1</th>
                    <th>Alternativa 2</th>
                    <th>Observación</th>
                    <th>Fecha de próximo control</th>
                    <th>Acción</th>
                </tr>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
    @endsection
</body>
    @section('js')
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
            <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('datatables/dataTables.responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('js/dataTables.sweetalert2@11.min.js')}}"></script>
    <script>
       $('#ubicaciont').DataTable({
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