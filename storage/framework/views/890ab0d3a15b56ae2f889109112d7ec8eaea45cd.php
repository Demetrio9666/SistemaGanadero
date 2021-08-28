
<?php $__env->startSection('nombre_regitro'); ?>
Registro Control de Desparasitación
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('controlDesparasitacion.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>">
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3" style="margin: 40px">
                    <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>" disabled=disabled >
                    <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e(old('animalCode_id')); ?>"  >
            </div>
    
</div>
        <div class="col-md-6">
            <label for="">Desparasitante:</label>
            <select class="form-control" id="des"  name="deworming_id" value="<?php echo e(old('deworming_id')); ?>">
                <option selected></option>
                <?php $__currentLoopData = $des; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($i->id); ?>" <?php if(old('deworming_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->dewormer_d); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>  
        <div class="col-md-6">
            <label for="">Fecha de re-desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r"   value="<?php echo e(old('date_r')); ?>">
        </div>
        <div  class="form-group">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
    
    
    <center>
        <div class="col-md-6" style="margin: 40px">
            
            <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/controlDesparasitacion')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/controlDesparasitacion')); ?>" >Guardar</button>
    </div>
    </center>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dewormerC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dewormerC/create-dewormerC.blade.php ENDPATH**/ ?>