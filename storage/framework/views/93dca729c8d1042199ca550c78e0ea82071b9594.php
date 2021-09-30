
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal ya consta en la ficha <strong>REPRODUCCIÓN</strong> por monta natural externa.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('/fichaReproduccionEx')); ?>" >Regresar</a>
    </center>
    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/fichaReproduccionExterna/externa.blade.php ENDPATH**/ ?>