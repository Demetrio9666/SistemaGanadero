<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <table id="tableanimales" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr> 
                  <th>Codigo Animal</th>
                  <th>Fecha Nacimiento</th>
                  <th>Age</th>
                  <th>Sexo</th>
                  <th>Raza</th>
                  <th>%</th>  
              </tr>
          </thead>
          <tbody>
              @foreach ($animales as $i1)
              <tr>
                  <td>{{$i1->animalCode}}</td>
                  <td>{{$i1->fecha_nacimiento}}</td>
                  <td>{{$i1->age_month}}</td>
                  <td>{{$i1->sex}}</td>         
              </tr>
               @endforeach 
          </tbody>
          <tfoot>
              <tr>
                <th>Codigo Animal</th>
                <th>Fecha Nacimiento</th>
                <th>Age</th>
                <th>Sexo</th>
                <th>Raza</th>
                <th>%</th>
              </tr>
          </tfoot>
      </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
       $('#tableanimales').DataTable({
         responsive: true
       });
    </script>
    </body