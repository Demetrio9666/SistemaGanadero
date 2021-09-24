
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>vacona</strong>  su rango de edad es de 23 a 36 meses.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('/fichaAnimal')); ?>" >Regresar</a>
    </center>
    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/fichaAnimal/vacona.blade.php ENDPATH**/ ?>