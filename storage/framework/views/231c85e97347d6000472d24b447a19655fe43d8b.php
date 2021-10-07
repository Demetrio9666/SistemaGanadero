
    <?php $__env->startSection('content_header'); ?>
    <label>Hora:</label>
    <br>
    <div id="reloj" class="reloj">00 : 00 : 00</div>
    <br>
    <br>
  <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary" >
            <div class="inner">
              <h3><?php echo e($disponible); ?></h3>

              <p>Animales Disponibles</p>
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
              <h3><?php echo e($vendidos); ?></h3>

              <p>Animales Vendidos</p>
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
              <h3><?php echo e($reproduccion); ?></h3>

              <p>Animales Reproducción</p>
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
              <h3><?php echo e($totales); ?></h3>

              <p>Total de Animales</p>
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
                    <canvas id="barChart" style="height:330px; min-height:430px"></canvas>
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
                          <canvas id="barChart2" style="height:330px; min-height:430px"></canvas>
                        </div>
                     </div>
                 </div> 
         </section>
    </div>
            
        
        
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('Chartjs/Chart.js')); ?>"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var cData = JSON.parse(`<?php echo $datas; ?>`)
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Toro', 'Torete', 'Ternero', 'Vaca', 'Vacona', 'Vaconilla','Ternera'],
                datasets: [{
                    label: 'Ganado',
                    data: cData,
                    backgroundColor: [
                        'rgba(12, 45, 246, 0.97)',
                        'rgba(121, 12, 246, 1)',
                        'rgba(0, 170, 252, 1)',
                        'rgba(252, 0, 252, 1)',
                        'rgba(255, 168, 255, 0.93)',
                        'rgba(234, 246, 101, 0.93)',
                        'rgba(172, 246, 195, 0.93)',
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
            type: 'doughnut',
            data: {
                labels: ['Macho', 'Hembra'],
                datasets: [{
                    
                    data: cData,
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

       
  
    <?php $__env->stopSection(); ?>










<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>