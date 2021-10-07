

<?php $__env->startSection('nombre_card'); ?>
Registros de Razas Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('confRaza/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/Razas')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-confRaza')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-confRaza')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Registros de Razas Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de la Raza</th>
            <th>Porcentaje</th>
            <th>Estado actual de la Información</th> 
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td ><?php echo e($i->race_d); ?></td>
            <td><?php echo e($i->percentage); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>

            <td>
                <center>
                    <a class="btn btn-primary" href="<?php echo e(route('confRaza.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a> 
                </center>
               
            </td>  
            
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
</table>
<?php $__env->stopSection(); ?>
 
 
<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/race/index-race.blade.php ENDPATH**/ ?>