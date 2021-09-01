<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($message); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/messages/message.blade.php ENDPATH**/ ?>