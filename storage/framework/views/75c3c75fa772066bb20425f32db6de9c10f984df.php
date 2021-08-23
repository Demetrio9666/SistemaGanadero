
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Materiales Genéticos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">            
    <thead>            
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado Actual</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $arti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->raza); ?></td>
            <td><?php echo e($i->reproduccion); ?></td>
            <td ><?php echo e($i->supplier); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/pdf.blade.php ENDPATH**/ ?>