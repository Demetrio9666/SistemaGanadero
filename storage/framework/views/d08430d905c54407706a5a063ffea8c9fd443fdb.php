
<?php $__env->startSection('nombre_regitro'); ?>
Editar Material Genético
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('confMate.update',$arti->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Fecha de Registro:</label>
        <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($arti->date); ?>" >
    </div>
    <div class="form-group">
        <label for="">Raza:</label>
        <select class="form-control" id="razas" name="race_id"  value="<?php echo e($arti->race_id); ?>"  >
                <option></option>
            <?php $__currentLoopData = $razas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <option value="<?php echo e($i->id); ?>" <?php if($arti->race_id == $i->id): ?> selected <?php endif; ?> > <?php echo e($i->race_d); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tipo de Material Genético:</label>

        <select class="form-control" id="inputPassword4"  name="reproduccion"   value="<?php echo e($arti->reproduccion); ?>">
        
           <option selected></option>
           <option value ="PAJUELA" <?php if( $arti->reproduccion == "PAJUELA"): ?> selected <?php endif; ?>>PAJUELA</option>
           <option value ="HEMBRIONAL" <?php if($arti->reproduccion == "HEMBRIONAL"): ?>selected <?php endif; ?> >HEMBRIONAL</option>
            
      </select>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="proveedor" name="supplier"   value="<?php echo e($arti->supplier); ?>"onblur="upperCase()">
    </div>      
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($arti->actual_state); ?>">
            <option value="ACTIVO" <?php if( $arti->actual_state == "ACTIVO"): ?> selected <?php endif; ?>>ACTIVO</option>
            <option value="INACTIVO" <?php if( $arti->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div> 
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/confMate')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/confMate')); ?>" >Guardar</button>
        </div>
    </center> 
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('artificialR.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/edit-artificialR.blade.php ENDPATH**/ ?>