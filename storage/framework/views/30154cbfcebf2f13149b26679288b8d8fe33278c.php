
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Vacunas Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">     
    <thead>            
        <tr>
            <th>Nombre de la Vacuna</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $vacuna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
            <tr>
                <td><?php echo e($i->vaccine_d); ?></td>
                <td ><?php echo e($i->date_e); ?></td>
                <td><?php echo e($i->date_c); ?></td>
                <td ><?php echo e($i->supplier); ?></td>
                <td ><?php echo e($i->actual_state); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>  

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccine/pdf.blade.php ENDPATH**/ ?>