

<?php $__env->startSection('nombre_card'); ?>
Registros de Desparacitantes Activas
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_atras'); ?>
"<?php echo e(url('/confDespa')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-Desparasitantes-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-Desparasitantes-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Desparasitantes Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Nombre del Desparasitante</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado Actual</th> 
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $desp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->dewormer_d); ?></td>
            <td ><?php echo e($i->date_e); ?></td>
            <td><?php echo e($i->date_c); ?></td>
            <td ><?php echo e($i->supplier); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
                <center>
                    <a class="btn btn-primary" href="<?php echo e(route('inactivos.Desparasitantes.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                    <form action="<?php echo e(route('inactivos.Desparasitantes.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?> 
                        <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit"  class="btn btn-danger" value="Eliminar"  >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>    
                </center>
                                   
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablasInactivas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dewormer/index-inactivo.blade.php ENDPATH**/ ?>