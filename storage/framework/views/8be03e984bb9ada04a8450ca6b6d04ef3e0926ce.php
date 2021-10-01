

<?php $__env->startSection('nombre_card'); ?>
Registros de Reproducción Artificial Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_atras'); ?>
"<?php echo e(url('/fichaReproduccionA')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-fichaReproduccionA-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-fichaReproduccionA-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
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
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th>
            <th>Acción</th>
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
            <td><?php echo e($i->reproduction_state); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
                <center>
                <a class="btn btn-primary  " href="<?php echo e(route('inactivos.fichaReproduccionA.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fichaReproduccionA.destroy')): ?>
                        <form action="<?php echo e(route('inactivos.fichaReproduccionA.destroy',$i->id)); ?>"  class="d-inline  formulario-eliminar"  method="POST">
                            <?php echo method_field('DELETE'); ?> 
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <button type="submit"  class="btn btn-danger" value="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>      
                <?php endif; ?>
                    </center>         
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablasInactivas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/index-inactivo.blade.php ENDPATH**/ ?>