
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Controles de Vacunaciones Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">          
    <thead>            
        <tr>
            <th>Fecha de la Vacunación</th>
            <th>Código del Animal</th>
            <th>Vacuna</th>
            <th>Fecha de próxima dosis</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $vacunaC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->animal); ?></td>
            <td ><?php echo e($i->vacuna); ?></td>
            <td ><?php echo e($i->date_r); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccineC/pdf.blade.php ENDPATH**/ ?>