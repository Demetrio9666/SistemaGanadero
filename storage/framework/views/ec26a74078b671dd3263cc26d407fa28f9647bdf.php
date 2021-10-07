
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="/css/imagenbusqueda1.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
       
<center>
  <div style="margin-top: 19px; ">
      <div class="card" style="width: 200px; height:200px">
          <div id="imagenPreview"  >
             <img src=" <?php echo e($imagen); ?>" id="imagenAct">
          </div>
      </div>
  </div>
            
</center>
 
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Raza</th>
                <th scope="col">Sexo</th>
                <th scope="col">Etapa</th>
                <th scope="col">Origen</th>
                <th scope="col">Edad-meses</th>
                <th scope="col">Cant. Partos</th>
                <th scope="col">Estado Actual</th> 
            </tr>
        </thead>
        <tbody>  
                 
            <tr>
                <td><?php echo e($codigoA); ?></td>
                <td><?php echo e($fecha); ?></td>
                <td><?php echo e($raza); ?></td>
                <td><?php echo e($sexo); ?></td>
                <td><?php echo e($etapa); ?></td>
                <td><?php echo e($origen); ?></td>
                <td><?php echo e($edad); ?></td>
                <td><?php echo e($par); ?></td>
                <td><?php echo e($estado); ?></td>
              
            </tr>
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>
  
<div class="row">
  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Fichas de Reproducción Artificial</h3>
  
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
             Tipos Reproducción Artificial</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart2" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>
  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Ficha de Reproducción Natural Interno</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart3" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>

  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Ficha de Reproducción Natural Externo</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart4" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>
</div>
<div class="card">
  <div class="card-body">
    <div class="titulo "><h1> Vacunaciones</h1></div>
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha de la Vacunación</th>
                <th scope="col">Vacuna</th>
            </tr>
        </thead>
        <tbody>  
          <?php $__currentLoopData = $vacunaC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td ><?php echo e($i->animal); ?></td>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->vacuna); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>

<div class="card">
  <div class="card-body">
    <div class="titulo "><h1> Desparasitaciones</h1></div>
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha de la desparasitación</th>
                <th scope="col">Desparasitante</th>
            </tr>
        </thead>
        <tbody>  
          <?php $__currentLoopData = $desC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          <tr>
            <td ><?php echo e($i->animal); ?></td>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->des); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>





    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('Chartjs/Chart.js')); ?>"></script>
<script>
  var ctx = document.getElementById('barChart').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas2; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Artificial',
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
  ///////////
  var ctx = document.getElementById('barChart2').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas3; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Pajuela', 'Hembrional'],
          datasets: [{
              label: 'Tipos de reproducción Artificial',
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
  //////
  var ctx = document.getElementById('barChart3').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas4; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Natural Interno',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(121, 12, 246, 1)',
                  'rgba(255, 168, 255, 0.93)',
                  'rgba(234, 246, 101, 0.93)',
                  
                  
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
  //////
  var ctx = document.getElementById('barChart4').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas4; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Natural Externo',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(121, 12, 246, 1)',
                  'rgba(255, 168, 255, 0.93)',
                  'rgba(234, 246, 101, 0.93)',
                  
                  
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






    
    
   



<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dashboard/resultado.blade.php ENDPATH**/ ?>