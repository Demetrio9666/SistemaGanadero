

<?php $__env->startSection('nombre_card'); ?>
        Lista de Usuarios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('usuarios/create')); ?>"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('nombre_tabla'); ?>
Registros de Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td ><?php echo e($i->name); ?></td>
            <td><?php echo e($i->email); ?></td>
            <td>
                <center>
                    <a class="btn btn-primary" href="<?php echo e(route('usuarios.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                    <form action="<?php echo e(route('usuarios.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?> 
                        <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                </center>
               
                </form>
            </td>  
            
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.baseTablasUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>