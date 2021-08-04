

<?php $__env->startSection('nombre_card'); ?>
        Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('rol/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Registros de Roles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr >
            <td><?php echo e($i->id); ?></td>
            <td ><?php echo e($i->name); ?></td>
            <td>
                <a class="btn btn-primary" href="<?php echo e(route('rol.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                <form action="<?php echo e(route('rol.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?> 
                    <button type="submit"  class="btn btn-danger" value="Eliminar"  >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>                         
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
</table>
<?php $__env->stopSection(); ?>




    <?php $__env->startSection('js'); ?>
    <?php if(session('Infor')=='ok' ): ?>
    <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'EL ROL SE A GUARDADO ',
            showConfirmButton: false,
            timer: 1500
      })

    </script>

    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/index-rol.blade.php ENDPATH**/ ?>