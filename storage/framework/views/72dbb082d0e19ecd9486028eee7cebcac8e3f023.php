

<?php $__env->startSection('nombre_card'); ?>
        Registros de Tratamientos Activos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('fichaTratamiento/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/fichaTratamientos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-fichaTratamiento')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-fichaTratamiento')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Tratamientos Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Tratamiento</th>
                    <th>Código del Animal</th>
                    <th>Enfermedad </th>
                    <th>Detalle</th>
                    <th>Antibiótico</th>
                    <th>Vitamina</th>
                    <th>Tratamiento</th>
                    <th>Recuperación</th>
                    <th>Estado actual de la Información</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                <tr>
                    <td><?php echo e($i->date); ?></td>
                    <td><?php echo e($i->animal); ?></td>
                    <td><?php echo e($i->disease); ?></td>
                    <td><?php echo e($i->detail); ?></td>
                    <td><?php echo e($i->anti); ?></td>
                    <td><?php echo e($i->vi); ?></td>
                    <td><?php echo e($i->treatment); ?></td>
                    <td><?php echo e($i->recovery); ?></td>
                    <td><?php echo e($i->actual_state); ?></td>
                    <td>
                        <a class="btn btn-primary  " href="<?php echo e(route('fichaTratamiento.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>                      
                    </td>  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
        </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_treatment/index-treatment.blade.php ENDPATH**/ ?>