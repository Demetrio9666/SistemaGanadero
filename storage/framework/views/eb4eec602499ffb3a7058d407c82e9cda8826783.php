
<?php $__env->startSection('nombre_regitro'); ?>
Editar Antibiótico
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('confAnt.update',$anti->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre del Antibiótico:</label>
        <input type="text" class="form-control" id="antibiotic_d" name="antibiotic_d" value="<?php echo e($anti->antibiotic_d); ?>" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="<?php echo e($anti->date_e); ?>">
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="<?php echo e($anti->date_c); ?>" >
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo e($anti->supplier); ?>" onblur="upperCase()" >
    </div>   
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($anti->actual_state); ?>">
            <option selected></option>
            <option value="DISPONIBLE" <?php if($anti->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO" <?php if($anti->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>   
    <center>
        <div class="form-group">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confAnt')); ?>" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confAnt')); ?>" >Actualizar</button>
        </div>
    </center>     
   
</form>

<?php $__env->stopSection(); ?>


























<?php echo $__env->make('antibiotic.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/antibiotic/edit-antibiotic.blade.php ENDPATH**/ ?>