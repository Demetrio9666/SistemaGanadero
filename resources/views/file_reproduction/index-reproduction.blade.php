<head>
    <link href="{{asset('css/app.css')}}">
</head>
  <body>
    @extends('adminlte::page')
    @section('title')
    @section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    @endsection  
    @section('content_header')
    <a type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" href="{{url('fichaReproduccion/create')}}">Nuevo</a>
    <div class="card">
        <h1>Reproducción Artificial</h1>
        <div class="card-body">
          <table id="ubicaciont" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Código del Animal-Hembra</th>
                    <th>Raza </th>
                    <th>Tipo de Reproduccion Artificial</th>
                    <th>Raza Material Genético</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($re_A as $i)          
                <tr>
                    <td>{{$i->date_r}}</td>
                    <td>{{$i->animalA}}</td>
                    <td>{{$i->raza_h}}</td>
                    <td >{{$i->tipo}}</td>
                    <td >{{$i->raza_m}}</td>
                    <td>
                        <a class="btn btn-primary  " href="{{route('fichaReproduccion.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('fichaReproduccion.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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
                    <th>Fecha de Registro</th>
                    <th>Código del Animal-Hembra</th>
                    <th>Raza </th>
                    <th>Tipo de Reproduccion Artificial</th>
                    <th>Raza Material Genético</th>
                    <th>Acción</th>
                </tr>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>


    <div class="card">
        <h1>Reproducción Monta Interna</h1>
        <div class="card-body">
          <table id="ubicaciont2" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Código del Animal-Hembra</th>
                    <th>Raza-Hembra </th>
                    <th>Edad</th>
                    <th>Código del Animal-Macho</th>
                    <th>Raza-Macho </th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($re_NI as $i)          
                <tr>
                    <td>{{$i->date_r}}</td>
                    <td>{{$i->animalNI}}</td>
                    <td>{{$i->raza}}</td>
                    <td >{{$i->edad}}</td>
                    <td>
                        <a class="btn btn-primary  " href="{{route('fichaReproduccion.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('fichaReproduccion.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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
                    <th>Fecha de Registro</th>
                    <th>Código del Animal-Hembra</th>
                    <th>Raza-Hembra </th>
                    <th>Edad</th>
                    <th>Código del Animal-Macho</th>
                    <th>Raza-Macho </th>
                    <th>Acción</th>
                </tr>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>

    <div class="card">
        <h1>Reproducción Monta Externa</h1>
        <div class="card-body">
          <table id="ubicaciont3" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Código del Animal</th>
                    <th>Raza </th>
                    <th>Nombre de la Hacienda</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($re_NE as $i)          
                <tr>
                    <td>{{$i->date_r}}</td>
                    <td>{{$i->animalNE}}</td>
                    <td>{{$i->raza}}</td>
                    <td >{{$i->hacienda}}</td>
                    <td>
                        <a class="btn btn-primary  " href="{{route('fichaReproduccion.edit',$i->id)}}" >Editar</a>
                        <form action="{{route('fichaReproduccion.destroy',$i->id)}}"  class="d-inline  formulario-eliminar"  method="POST">
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
                    <th>Fecha de Registro</th>
                    <th>Código del Animal</th>
                    <th>Raza </th>
                    <th>Tipo de Reproduccion Artificial</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
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
<script>
    $('#ubicaciont2').DataTable({
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
<script>
    $('#ubicaciont3').DataTable({
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