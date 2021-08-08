
<head>

</head>
<body>

    <?php $__env->startSection('css'); ?>
    
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
    
    <div class="row">
         <section section class="col-lg-12 connectedSortable">
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
         <section section class="col-lg-12 connectedSortable">
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
        
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('Chartjs/Chart.js')); ?>"></script>
    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var cData = JSON.parse(`<?php echo $datas; ?>`)
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Total', 'Machos', 'Hembras'],
                datasets: [{
                    label: 'Ganado Reproducción',
                    data: cData,
                    backgroundColor: [
                        'rgba(12, 45, 246, 0.97)',
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
            type: 'polarArea',
            data: {
                labels: ['SI', 'NO'],
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

       
        

    <?php $__env->stopSection(); ?>
</body>









<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dashboard/reproduccion.blade.php ENDPATH**/ ?>