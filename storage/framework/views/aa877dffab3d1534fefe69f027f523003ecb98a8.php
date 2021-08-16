
<?php $__env->startSection('nombre_regitro'); ?>
         Registro de Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('usuarios.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" class="form-control <?php echo e($errors->has('nombreU') ? 'is-invalid':''); ?>" id="nombre" name="nombreU" value="<?php echo e(old('nombre')); ?>">
        
        <?php $__errorArgs = ['nombreU'];
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
    <div class="form-group">
        <label for="">Correo:</label>
        <input type="mail" class="form-control <?php echo e($errors->has('correoU') ? 'is-invalid':''); ?>" id="email" name="correoU" value="<?php echo e(old('correoU')); ?>">
        <?php $__errorArgs = ['correoU'];
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
    <div class="form-group">
        <label for="">Contraseña:</label>
        <input type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid':''); ?>" id="contraseña" name="password" value="<?php echo e(old('password')); ?>">
        <?php $__errorArgs = ['password'];
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
    <div class="form-group">
        <label for="">Confirmación de contraseña:</label>
        <input type="password" class="form-control <?php echo e($errors->has('nombreU') ? 'is-invalid':''); ?>" id="confirmacion" name="confirmacionU" value="<?php echo e(old('confirmacionU')); ?>">
        <?php $__errorArgs = ['confirmacionU'];
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
      
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/usuarios')); ?>" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/usuarios')); ?>" >Guardar</button>
        </div>
    </center>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.usuarios.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/create.blade.php ENDPATH**/ ?>