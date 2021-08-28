

<?php $__env->startSection('nombre_card'); ?>
Registros de Ubicaciones Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_atras'); ?>
"<?php echo e(url('/confUbicacion')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-Ubicaciones-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-Ubicaciones-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Ubicaciones Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre de ubicación</th>
            <th>Descripción</th>
            <th>Estado Actual</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $ubicacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->location_d); ?></td>
            <td ><?php echo e($i->description); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
                <a class="btn btn-primary" href="<?php echo e(route('inactivos.Ubicaciones.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                <form action="<?php echo e(route('inactivos.Ubicaciones.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?> 
                    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <button type="submit"  class="btn btn-danger" value="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>                         
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>   
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablasInactivas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/location/index-inactivo.blade.php ENDPATH**/ ?>