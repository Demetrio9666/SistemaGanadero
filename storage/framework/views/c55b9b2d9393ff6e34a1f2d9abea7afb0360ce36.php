

<?php $__env->startSection('nombre_card'); ?>
Registros de Materiales Genéticos Activas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('confMate/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/Materiales')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-confMate')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-confMate')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Registros de Materiales Genéticos Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
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
            <td>
               <center><a class="btn btn-primary" href="<?php echo e(route('confMate.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a></center> 
                                     
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/index-artificialR.blade.php ENDPATH**/ ?>