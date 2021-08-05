
<?php $__env->startSection('nombre_regitro'); ?>
         Registro Material Genético
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('confMate.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="">Fecha de Registro:</label>
        <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>">
    </div>
    <div class="form-group">
        <label for="">Raza:</label>
        <select class="form-control" id="razas" name="race_id" value="<?php echo e(old('race_id')); ?>">
            <option selected></option>
            <?php $__currentLoopData = $razas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <option value="<?php echo e($i->id); ?>" <?php if(old('race_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->race_d); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    </div>
    <div class="form-group">
        <label for="">Tipo de Material Genético:</label>
        <select class="form-control" id="inputPassword4"  name="reproduccion" value="<?php echo e(old('reproduccion')); ?>">
            <option selected></option>
            <option value="PAJUELA" <?php if(old('reproduccion') == "PAJUELA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>PAJUELA</option>
            <option value="HEMBRIONAL" <?php if(old('reproduccion') == "HEMBRIONAL"): ?> <?php echo e('selected'); ?> <?php endif; ?> >HEMBRIONAL</option>
      </select>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="proveedor" name="supplier" value="<?php echo e(old('supplier')); ?>" onblur="upperCase()">
    </div> 
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
            <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
         </select>
    </div>  
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confMate')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confMate')); ?>" >Guardar</button>
        </div>
    </center>    
    
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('artificialR.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/create-artificialR.blade.php ENDPATH**/ ?>