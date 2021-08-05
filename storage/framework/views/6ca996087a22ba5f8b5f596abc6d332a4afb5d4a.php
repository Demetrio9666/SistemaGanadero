
<?php $__env->startSection('nombre_regitro'); ?>
Editar ubicación Inactiva
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('inactivos.Ubicaciones.update',$ubicacion->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-group">
        <label for="">Nombre de ubicación:</label>
        <input type="text" class="form-control" id="location_d" name="location_d" value="<?php echo e($ubicacion->location_d); ?>" onblur="upperCase()" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <input type="text" class="form-control" id="descripcion" name="description" value="<?php echo e($ubicacion->description); ?>" onblur="upperCase()"disabled=disabled>
    </div>      
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($ubicacion->actual_state); ?>">
            <option value="DISPONIBLE" <?php if($ubicacion->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?> >DISPONIBLE</option>
            <option value="INACTIVO" <?php if($ubicacion->actual_state == "INACTIVO"): ?> selected <?php endif; ?> >INACTIVO</option>
         </select>
    </div> 
    <center>
        <div class="form-group">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/inactivos/Ubicaciones')); ?>" >Cancelar</a>
            <button type="submit" class="btn btn-success btn" href="<?php echo e(Redirect::to('/inactivos/Ubicaciones')); ?>" >Actualizar</button>
        </div>
    </center>    
   
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('location.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/location/edit-inactivo.blade.php ENDPATH**/ ?>