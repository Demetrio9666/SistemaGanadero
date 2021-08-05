
<?php $__env->startSection('nombre_regitro'); ?>
         Registro Ubicación
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('confUbicacion.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="">Nombre de la ubicación:</label>
        <input type="text" class="form-control" id="location_d" name="location_d" value="<?php echo e(old('location_d')); ?>" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <input type="int" class="form-control" id="descripcion" name="description" value="<?php echo e(old('description')); ?>" onblur="upperCase()">
    </div> 
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
            <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
         </select>
    </div>   
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confUbicacion')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confUbicacion')); ?>" >Guardar</button>
        </div>
    </center> 
    
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('location.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/location/create-location.blade.php ENDPATH**/ ?>