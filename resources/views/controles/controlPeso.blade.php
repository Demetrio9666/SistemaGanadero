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
    <button type="button" class="btn btn-success" style="margin: 10px" id="button-addon1" data-toggle="modal" data-target="#modalcontrolp">Nuevo</button>
    

    <div class="card">
        <div class="card-body">
          <table id="controlp" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                   
                    <th>Fecha del Registro</th>
                    <th>Codigo del Animal</th>
                    <th>Peso Kg</th>
                    
                </tr>
            </thead>
            <tbody>            
                <tr>
                    
                    <td>04/04/2021</td>
                    <td>1223</td>
                    <td>120</td>
                            
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha del Registro</th>
                    <th>Codigo del Animal</th>
                    <th>Peso Kg</th>
                </tr>
            </tfoot>
        </table>

        </div>
    </div>
    @include('modal.modalControlP')
    @endsection
  

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
       $('#controlp').DataTable({
         responsive: true
       });
       $('#modalcontrolp').on('shown.bs.modal', function () {
       $('#myInput2').trigger('focus')
       });
    </script>
    @endsection
</body>