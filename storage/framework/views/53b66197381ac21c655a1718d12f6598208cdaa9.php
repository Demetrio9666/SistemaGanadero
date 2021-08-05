

<?php $__env->startSection('nombre_card'); ?>
Registros de Materiales Genéticos Inactivas
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_atras'); ?>
"<?php echo e(url('/confMate')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nombre_tabla'); ?>
Registros de Materiales
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado Actual</th> 
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
                <a class="btn btn-primary" href="<?php echo e(route('inactivos.Materiales.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                <form action="<?php echo e(route('inactivos.Materiales.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?> 
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

<?php echo $__env->make('layouts.baseTablasInactivas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/index-inactivo.blade.php ENDPATH**/ ?>