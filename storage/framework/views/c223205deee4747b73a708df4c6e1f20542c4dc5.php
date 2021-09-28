
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<br>
        <div class="alert alert-warning alert-dismissable">
            <strong>¡Cuidado!</strong> El animal ingresado ya esta vacunado con la elección de la vacuna escogida.
        </div>
        <br>
        <center>
            <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('controlVacuna/create')); ?>" >Regresar</a>
        </center>
        <br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/controlVacuna.blade.php ENDPATH**/ ?>