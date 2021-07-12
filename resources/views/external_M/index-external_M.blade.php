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
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('confAnimalExterno/create')}}">Nuevo</a>
    <div class="card">
        <div class="card-body">
          <table id="razat" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Codigo Animal</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Codigo Externo</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Hacienda</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($ext as $i)          
                <tr>
                    <td >{{$i->date_r}}</td>
                    <td>{{$i->animalCode}}</td>
                    <td>{{$i->raza}}</td>
                    <td>{{$i->edad}}</td>
                    <td>{{$i->sexo}}</td>

                    <td>{{$i->animalCode_Exte}}</td>
                    <td>{{$i->race_d}}</td>
                    <td>{{$i->age_month}}</td>
                    <td>{{$i->sex}}</td>
                    <td>{{$i->hacienda_name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('confAnimalExterno.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('confAnimalExterno.destroy',$i->id)}}" method="POST" class="d-inline  formulario-eliminar">
                            @csrf
                            @method('DELETE') 
                            <input type="submit"  class="btn btn-danger" value="Eliminar">
                        </form>
                          
                    </td>  
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Codigo Animal</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>CodigoExterno</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Hacienda</th>
                    <th>Acción</th>
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
            <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script>
       $('#razat').DataTable({
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