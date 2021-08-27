
<?php $__env->startSection('nombre_regitro'); ?>
         Registro Peso de Animales
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('controlPeso.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>" >
            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-md-6">
          
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text" class="<?php echo e($errors->has('date') ? 'is-invalid':''); ?>" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                        <input type="hidden" id="idcodi" name="animalCode_id">
                        <?php $__errorArgs = ['animalCode_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Peso KG:</label>
            <input type="decimal" class="form-control <?php echo e($errors->has('weigtht') ? 'is-invalid':''); ?>" id="peso" name="weigtht" onChange="ValidarPeso(this.value)" value="<?php echo e(old('weigtht')); ?>" >
            <?php $__errorArgs = ['weigtht'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-md-6">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha_rv" name="date_r" value="<?php echo e(old('date_r')); ?>">
            <?php $__errorArgs = ['date_r'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div  class="col-md-6">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                    <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/controlPeso')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/controlPeso')); ?>" >Guardar</button>
            </div>
        </center>
    </div>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('weigthC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/weigthC/create-weigthC.blade.php ENDPATH**/ ?>