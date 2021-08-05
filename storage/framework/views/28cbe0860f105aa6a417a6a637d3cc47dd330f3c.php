
<?php $__env->startSection('nombre_regitro'); ?>
         Registro Vacunas
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('confVacuna.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="">Nombre de la Vacuna:</label>
        <input type="text" class="form-control" id="vaccine_d" name="vaccine_d" value="<?php echo e(old('vaccine_d')); ?>" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="<?php echo e(old('date_e')); ?>" >
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="<?php echo e(old('date_c')); ?>">
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo e(old('supplier')); ?>" onblur="upperCase()">
    </div>   
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
            <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
         </select>
    </div> 
    <center>
        <div class="form-group" style="margin: 40px" >
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confVacuna')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confVacuna')); ?>" >Guardar</button>
        </div>
    </center>   
   
</form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('vaccine.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccine/create-vaccine.blade.php ENDPATH**/ ?>