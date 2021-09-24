
  
    <?php $__env->startSection('content_header'); ?>
    <label>Hora:</label>
    <br>
    <div id="reloj" class="reloj">00 : 00 : 00</div>
    <br>
    <br>
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-book"></i>
            Registrar roles </h3>

         </div>
        <div class="container" id="registration-form">
            <div class="card">
                <div class="card-body">
                    <div class="frm">
                        <?php $__errorArgs = ['Nombre_del_rol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($message); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php echo Form::open(['route' => 'rol.store']); ?>

                             <label for="" class="form-label">Nombre del Rol:</label>
                             <input type="text" class="form-control <?php echo e($errors->has('rol')?'is-invalid':''); ?>" id="rol" name="rol"  onblur="upperCase()">
                             <?php $__errorArgs = ['rol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <div class="invalid-feedback"><?php echo e($message); ?></div>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php echo $__env->make('admin.base.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                        <?php echo Form::close(); ?>

        
                    </div>

                </div>

            </div>
            
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/create-rol.blade.php ENDPATH**/ ?>