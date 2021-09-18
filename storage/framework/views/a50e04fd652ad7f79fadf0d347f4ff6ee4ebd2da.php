<input  type="hidden"  name="id"  value="<?php echo e(auth()->user()->id); ?>" >
<input  type="hidden"  name="usuario"  value="<?php echo e(auth()->user()->name); ?>">
<input  type="hidden"  name="correo"  value="<?php echo e(auth()->user()->email); ?>">
<input  type="hidden"  name="rol"  value="<?php echo e(auth()->user()->roles->pluck('rol')); ?>"><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/layouts/base-usuario.blade.php ENDPATH**/ ?>