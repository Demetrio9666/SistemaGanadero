

<?php $__env->startSection('nombre_card'); ?>
        Registros de Controles de Pesos Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('controlPeso/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/controlPesos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-controlPeso')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-controlPeso')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Controles de Pesos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Peso</th>
            <th>Fecha de próximo control</th>
            <th>Estado actual de la Información</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $pesoC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->animal); ?></td>
            <td ><?php echo e($i->weigtht); ?></td>
            <td ><?php echo e($i->date_r); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
                <center>
                    <a class="btn btn-primary" href="<?php echo e(route('controlPeso.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a> 
                </center>
                                     
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/weigthC/index-weigthC.blade.php ENDPATH**/ ?>