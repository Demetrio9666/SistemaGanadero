<head>
    <link href="{{asset('css/app.css')}}">
</head>
<body>
        @extends('adminlte::page')
        @section('title')
        @section('css')
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
        @endsection

        @section('content_header')
                  <button type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" data-toggle="modal" data-target="#modalfichaa">Nuevo</button>
                  <div class="card">
                    <div class="card-body">
                      <table id="animal" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo Animal</th>
                                <th>Foto</th>
                                <th>Fecha Nacimiento</th>
                                <th>Raza</th>
                                <th>%</th>
                                <th>Sexo</th>
                                <th>Origen</th>
                                <th>Area</th>
                                <th>Edad-meses</th>
                                <th>Salud</th>
                                <th>Estado</th>
                                <th>Concedido</th>           
                                <th>Padre</th>
                                <th>Madre</th>                  
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>         
                                <td>2011/04/25</td>
                                <td>jhjhhhjhjh</td>
                            </tr>
                
                   
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Codigo Animal</th>
                              <th>Foto</th>
                              <th>Fecha Nacimiento</th>
                              <th>Raza</th>
                              <th>%</th>
                              <th>Sexo</th>
                              <th>Origen</th>
                              <th>Area</th>
                              <th>Edad-meses</th>
                              <th>Salud</th>
                              <th>Estado</th>
                              <th>Concedido</th>           
                              <th>Padre</th>
                              <th>Madre</th>      
                            </tr>
                        </tfoot>
                    </table>
                
                    </div>
                </div>
            
                  @include("modal.modalFichaA")
                 
              
        @endsection
        @section('js')
                  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
                  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
                  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
                  <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
                  <script>
                      $('#animal').DataTable({
                        responsive: true
                      });
                  </script>
                  <script>
                    $('#modalfichaa').on('shown.bs.modal', function () {
                            $('#myInput2').trigger('focus')
                            });
                  </script>
                 
          @endsection
</body>
