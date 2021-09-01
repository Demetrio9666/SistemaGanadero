
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado ya esta vacunado con la elección de la vacuna escogida.
    </div>
    <center>
        <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('controlVacuna')); ?>" >Regresar</a>
    </center>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/controlVacunaEdit.blade.php ENDPATH**/ ?>