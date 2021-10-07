

<?php $__env->startSection('nombre_card'); ?>
Registros de Controles de Desparasitaciones Activas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('controlDesparasitacion/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/controlDesparasitaciones')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-controlDesparasitacion')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-controlDesparasitacion')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Ficha de Controles de Desparasitaciones Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Desparasitación</th>
            <th>Código del Animal</th>
            <th>Desparasitante</th>
            <th>Fecha de próxima dosis</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $desC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->animal); ?></td>
            <td><?php echo e($i->des); ?></td>
            <td ><?php echo e($i->date_r); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
               <center><a class="btn btn-primary" href="<?php echo e(route('controlDesparasitacion.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a></center> 
                                      
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    
</table>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dewormerC/index-dewormerC.blade.php ENDPATH**/ ?>