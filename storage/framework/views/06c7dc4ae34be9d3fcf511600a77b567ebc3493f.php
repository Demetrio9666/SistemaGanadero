
<?php $__env->startSection('nombre_regitro'); ?>
         Editar Vacuna
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('inactivos.Vacunas.update',$vacuna->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre de la Vacuna:</label>
        <input type="text" class="form-control" id="vaccine_d" name="vaccine_d" value="<?php echo e($vacuna->vaccine_d); ?>" onblur="upperCase()"disabled=disabled >
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="<?php echo e($vacuna->date_e); ?>"disabled=disabled >
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="<?php echo e($vacuna->date_c); ?>" disabled=disabled >
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo e($vacuna->supplier); ?>" onblur="upperCase()" disabled=disabled >
    </div>  
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($vacuna->actual_state); ?>">
            <option value="DISPONIBLE"<?php if( $vacuna->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
            <option value="INACTIVO" <?php if( $vacuna->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>       
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('inactivos/Vacunas')); ?>" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('inactivos/Vacunas')); ?>" >Actualizar</button>
        </div>
    </center>  
   
</form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('vaccine.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccine/edit-inactivo.blade.php ENDPATH**/ ?>