<head>
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/responsive.bootstrap4.min.css')}}">
    </head>
    <body>
      <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th> 
                    <th>Codigo Animal</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Acción</th>
                    
                         
                </tr>
            </thead>
            <tbody>
                
                  @foreach ($interna as $i)          
                  <tr>
                      <td>{{$i->id}}</td>
                      <td>{{$i->animalCode}}</td>
                      <td>{{$i->race_d}}</td>
                      <td>{{$i->age_month}}</td>
                      
                      <td> <button type="button" class="btn btn-success btn-lg   btselect"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>
                      
                    </tr>
                  @endforeach        
                 
            </tbody>
            <tfoot>
                <tr>
                  <th>#</th> 
                  <th>Codigo Animal</th>
                  <th>Raza</th>
                  <th>Edad</th>
                  <th>Acción</th>
                </tr>
            </tfoot>
        </table>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/dataTables.sweetalert2@11.min.js')}}"></script>
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
      </body
    