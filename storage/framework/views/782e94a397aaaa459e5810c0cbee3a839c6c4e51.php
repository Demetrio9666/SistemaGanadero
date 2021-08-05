
<?php $__env->startSection('nombre_regitro'); ?>
Editar Vitamina Inactiva
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('inactivos.Vitaminas.update',$vitamina->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre de la Vitamina:</label>
        <input type="text" class="form-control" id="vitamina_d" name="vitamin_d" value="<?php echo e($vitamina->vitamin_d); ?>" onblur="upperCase()" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="<?php echo e($vitamina->date_e); ?>" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="<?php echo e($vitamina->date_c); ?>" disabled=disabled>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo e($vitamina->supplier); ?>" onblur="upperCase()"disabled=disabled>
    </div>   
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($vitamina->actual_state); ?>">
            <option value="DISPONIBLE" <?php if( $vitamina->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO" <?php if( $vitamina->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>    
    <center>
            <div class="form-group" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('inactivos/Vitaminas')); ?>" >Cancelar</a>
                <button type="submit" class="btn btn-success btn" href="<?php echo e(Redirect::to('inactivos/Vitaminas')); ?>" >Actualizar</button>
            </div>
    </center>    
    
</form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('vitamin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vitamin/edit-inactivo.blade.php ENDPATH**/ ?>