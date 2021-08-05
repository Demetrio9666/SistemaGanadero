
<?php $__env->startSection('nombre_regitro'); ?>
         Editar Antibióticos Inactiva
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('inactivos.Antibioticos.update',$anti->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre del Antibiótico:</label>
        <input type="text" class="form-control" id="antibiotico_d" name="antibiotic_d" value="<?php echo e($anti->antibiotic_d); ?>" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="<?php echo e($anti->date_e); ?>" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="<?php echo e($anti->date_c); ?>" disabled=disabled>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="proveedor" name="supplier" value="<?php echo e($anti->supplier); ?>" disabled=disabled>
    </div>   
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($anti->actual_state); ?>">
            <option value="DISPONIBLE" <?php if($anti->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO" <?php if($anti->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>        
    <div class="form-group">
        <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('inactivos/Antibioticos')); ?>" >Cancelar</a>
        <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('inactivos/Antibioticos')); ?>" >Actualizar</button>
    </div>
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('antibiotic.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/antibiotic/edit-inactivo.blade.php ENDPATH**/ ?>