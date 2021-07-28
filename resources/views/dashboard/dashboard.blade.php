@extends('adminlte::page')
<head>

</head>
<body>

    @section('css')
    
    @endsection
    @section('content_header')
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary" >
            <div class="inner">
              <h3>{{$disponible}}</h3>

              <p>Disponibles</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$vendidos}}</h3>

              <p>Vendidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$reproduccion}}</h3>

              <p>Reproducción</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$total}}</h3>

              <p>Total</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        <!--section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Ganado
                      </h3>
                </div>
            </div>
            <section-->
         <section section class="col-lg-6 connectedSortable">
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                      Ganado</h3>
 
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px; min-height:230px"></canvas>
                  </div>
               </div>

            </div>
           
         </section>
         <section section class="col-lg-6 connectedSortable">
            
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                            Sexo</h3>
                      </div>
                      <div class="card-body">
                        <div class="chart">
                          <canvas id="barChart2" style="height:230px; min-height:230px"></canvas>
                        </div>
                     </div>
                 </div>

            
            

         </section>
            
        
        
    @endsection
    @section('js')
    <script type="text/javascript" src="{{asset('Chartjs/Chart.js')}}"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Toro', 'Torete', 'Ternero', 'Vaca', 'Vacona', 'Vaconilla','Ternero'],
                datasets: [{
                    
                    data: [12, 19, 3, 5, 2, 3,8],
                    backgroundColor: [
                        'rgba(12, 45, 246, 0.97)',
                        'rgba(40, 70, 255, 0.67)',
                        'rgba(0, 208, 248, 0.94)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                 
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var ctx = document.getElementById('barChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Macho', 'Hembra'],
                datasets: [{
                    
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(12, 45, 246, 0.97)',
                        'rgba(250, 0, 198, 0.74)',

                    ],
                 
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

    @endsection
</body>








