
<?php $__env->startSection('css'); ?>
     <link rel="stylesheet" type="text/css" href="<?php echo e(('/css/slider.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>


    <div class="card card-dark">
        <div class="card-header">
                <h1 class="card-title"> Bienvenid@</h1>
        </div>
       
          <div class="slider" style="margin: 40px">
                <ul>
                  <li><img src="imagen/slider/1a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/2a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/3a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/4a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/5a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/6a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/7a.jpeg" alt=""></li>
                  <li><img src="imagen/slider/8a.jpeg" alt=""></li>
                </ul>
           
          </div>
          <!--center>
            <label >La ganadería es una actividad que consiste en el manejo y explotación de animales domesticables con fines de producción, recuerda siempre mantenerlos saludables.</label>
          </center-->
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/index.blade.php ENDPATH**/ ?>