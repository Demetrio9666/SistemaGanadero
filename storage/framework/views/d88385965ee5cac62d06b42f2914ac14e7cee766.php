
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
    <br>
    <div class="alert alert-danger">
        <strong>¡Error!</strong> No Existe el animal.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('/dashboard-busqueda')); ?>" >Regresar</a>
    </center>
    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/buscar/noExiste.blade.php ENDPATH**/ ?>