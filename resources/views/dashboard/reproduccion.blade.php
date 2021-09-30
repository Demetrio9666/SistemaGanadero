@extends('adminlte::page')
    @section('content_header')
    <label>Hora:</label>
    <br>
    <div id="reloj" class="reloj">00 : 00 : 00</div>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary" >
            <div class="inner">
              <h3>{{$artificial}}</h3>

              <p>Animales en Reproducción Artificial </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$natual}}</h3>

              <p>Animales en Reproducción Natural Interno</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$externa}}</h3>

              <p>Animales en Reproducción Natural Externo</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
          </div>
        </div>

        
    </div>
    <br>
    <br>
    <div class="row">
         <section section class="col-lg-6 connectedSortable">
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                      Animales en Estado de Reproducción</h3>
 
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:330px; min-height:130px"></canvas>
                  </div>
               </div>

            </div>
           
         </section>
         <section section class="col-lg-6 connectedSortable">
            <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                      Animales en Estado de Gestación</h3>
 
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart2" style="height:330px; min-height:130px"></canvas>
                  </div>
               </div>

            </div>
           
         </section>
       
            
    </div>   
        
    @endsection
    @section('js')
    <script type="text/javascript" src="{{asset('Chartjs/Chart.js')}}"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var cData = JSON.parse(`<?php echo $datas; ?>`)
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Artificial', 'Natural'],
                datasets: [{
                    label: 'Ganado Reproducción',
                    data: cData,
                    backgroundColor: [
                        
                        'rgba(121, 12, 246, 1)',
                        'rgba(0, 170, 252, 1)',
                        
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
        var cData = JSON.parse(`<?php echo $datas2; ?>`)
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Vacona', 'Vaca'],
                datasets: [{
                    label: 'Ganado Reproducción',
                    data: cData,
                    backgroundColor: [
                        'rgba(12, 45, 246, 0.97)',
                        'rgba(121, 12, 246, 1)',
                        
                        
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









