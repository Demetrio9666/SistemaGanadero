
<?php $__env->startSection('nombre_regitro'); ?>
         Mensaje
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>Toro</strong> su rango de edad 21 meses en adelante.
    </div>
    <div class="alert alert-danger">
        <strong>¡Cuidado!</strong> No puede estar en estado de <strong>REPRODUCCIÓN</strong>.
    </div>
    <div class="alert alert-danger">
        <strong>¡Cuidado!</strong> No puede estar en estado de <strong>Embarazo</strong> porque es macho.
    </div>
    <center>
        <a type="submit" class="btn btn-primary btn" href="<?php echo e(url('/fichaAnimal')); ?>" >Regresar</a>
    </center>
    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mensajes.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/mensajes/fichaAnimal/toro.blade.php ENDPATH**/ ?>