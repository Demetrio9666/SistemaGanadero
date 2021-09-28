
<?php $__env->startSection('nombre_regitro'); ?>
         Editar Raza Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('confRaza.update',$raza->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre de la Raza:</label>
        <input type="text" class="form-control" id="raza" name="race_d" value="<?php echo e($raza->race_d); ?>" >
    </div>
    <div class="form-group">
        <label for="">Porcentaje %:</label>
        <input type="int" class="form-control" id="porcentaje" name="percentage" value="<?php echo e($raza->percentage); ?>">
    </div>      
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($raza->actual_state); ?>">
            <option value="DISPONIBLE" <?php if( $raza->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO" <?php if( $raza->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>     
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confRaza')); ?>" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confRaza')); ?>" >Guardar</button>
        </div>
    </center>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('race.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/race/edit-race.blade.php ENDPATH**/ ?>