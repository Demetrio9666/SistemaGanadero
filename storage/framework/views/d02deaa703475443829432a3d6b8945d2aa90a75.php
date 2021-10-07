

<?php $__env->startSection('nombre_card'); ?>
Registros de Controles de Preñes Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('controlPrenes/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/controlPrenes')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-controlPrenes')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-controlPrenes')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Control de Preñes Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de control</th>
            <th>Código del Animal</th>
            <th>Vitamina </th>
            <th>Alternativa</th>
            <th>Alternativa</th>
            <th>Observación</th>
            <th>Fecha de próximo control</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td><?php echo e($i->animal); ?></td>
            <td ><?php echo e($i->vitamina); ?></td>
            <td ><?php echo e($i->alt1); ?></td>
            <td ><?php echo e($i->alt2); ?></td>
            <td ><?php echo e($i->observation); ?></td>
            <td ><?php echo e($i->date_r); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
               <center><a class="btn btn-primary " href="<?php echo e(route('controlPrenes.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a></center> 
                                         
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/PregnancyC/index-PregnancyC.blade.php ENDPATH**/ ?>