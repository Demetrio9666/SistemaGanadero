
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Razas Inactivos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">          
    <thead>            
        <tr>
            <th>Nombre de la Raza</th>
            <th>Porcentaje</th>
            <th>Estado Actual</th> 
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
        <tr>
            <td ><?php echo e($i->race_d); ?></td>
            <td><?php echo e($i->percentage); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/race/pdf-inactivo.blade.php ENDPATH**/ ?>