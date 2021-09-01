
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
        <div class="card card-dark" style="margin: 17%">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-book"></i>
                  <?php echo $__env->yieldContent('nombre_regitro'); ?>  </h3>

             </div>
        
               <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">

                        <?php echo $__env->yieldContent('formulario'); ?>
                        
                    </div>
              </div>
            </div> 
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/base.blade.php ENDPATH**/ ?>