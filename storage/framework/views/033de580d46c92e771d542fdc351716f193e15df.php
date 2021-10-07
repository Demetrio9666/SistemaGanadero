

<?php $__env->startSection('nombre_regitro'); ?>
         Animal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('formulario'); ?>
<div class="contenedor">
    <form action="<?php echo e(route('dashboard-busqueda.store')); ?>" method="POST" >                                                     
        <?php echo csrf_field(); ?>
        <button type="submit"  class="btn btn-success "  style="margin: 10px"  >Buscar</button>
        <input type="text" name="buscar" id="buscar" placeholder="Código Animal" >
    </form>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('dashboard.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dashboard/busqueda.blade.php ENDPATH**/ ?>