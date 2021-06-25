<head>
  <link href="{{asset('css/app.css')}}">
</head>
<body>
  @extends('adminlte::page')

  @section('title')

  @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
  @endsection
  @section('content_header')
    <button type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" data-toggle="modal" data-target="#modaldesparasitante">Nuevo</button>
  <div class="card">
      <div class="card-body">
        <table id="desparasitante" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Nombre de Desparacitante</th>
                  <th>Fecha Elaboracion</th>
                  <th>Fecha Caducidad </th>
                  <th>Proveedor</th>
              </tr>
          </thead>
          <tbody>            
              <tr>
                  <td>Donna Snider</td>
                  <td>Customer Support</td>
                  <td>Donna Snider</td>
                  <td>Customer Support</td>        
              </tr>
          </tbody>
          <tfoot>
              <tr>
                <th>Nombre de Desparacitante</th>
                <th>Fecha Elaboracion</th>
                <th>Fecha Caducidad </th>
                <th>Proveedor</th>
              </tr>
          </tfoot>
      </table>

      </div>
  </div>
  @include('modal.modalConfD')
  @endsection


  @section('js')
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
      <script>
            $('#desparasitante').DataTable({
              responsive: true
            });
            $('#modaldesparasitante').on('shown.bs.modal', function () {
            $('#myInput2').trigger('focus')
            });
      </script>
  @endsection
</body>