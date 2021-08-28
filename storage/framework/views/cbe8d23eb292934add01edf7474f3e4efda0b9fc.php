
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Reproducción Artificial Inactivos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
            <tr>
                <th>Fecha de Registro</th>
                <th>Código del Animal</th>
                <th>Raza </th>
                <th>Tipo de Reproducción Artificial</th>
                <th>Raza Material Genético</th>
                <th>Estado Actual</th> 
            </tr> 
    </thead>
    <tbody>  
        <?php $__currentLoopData = $re_A; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
        <tr>
            <td><?php echo e($i->fecha_A); ?></td>
            <td><?php echo e($i->animalA); ?></td>
            <td><?php echo e($i->raza_h); ?></td>
            <td ><?php echo e($i->tipo); ?></td>
            <td ><?php echo e($i->raza_m); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/pdf-inactivo.blade.php ENDPATH**/ ?>