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
    <div class="card">
        <div class="card-body">
          <table id="vacunacion" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo Parto</th>
                    <th>Codigo Animal(Madre)</th>
                    <th>Fecha de Parto</th>
                    <th>Cant.Machos</th>
                    <th>Cant.Hembras</th>
                    <th>Cant.Fallecidos</th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>Angelica Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                    <td><button type="button" class="btn btn-outline-primary"></button></td>
                    <td><button type="button" class="btn btn-outline-danger">Eliminar</button></td>
                </tr>
 
            </tbody>
            <tfoot>
                <tr>
                    <th>Codigo Parto</th>
                    <th>Codigo Animal(Madre)</th>
                    <th>Fecha de Parto</th>
                    <th>Cant.Machos</th>
                    <th>Cant.Hembras</th>
                    <th>Cant.Fallecidos</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        </div>
    </div>
    




    
    @endsection


    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
       $('#vacunacion').DataTable({
         responsive: true
       });
    </script>
    @endsection
</body>