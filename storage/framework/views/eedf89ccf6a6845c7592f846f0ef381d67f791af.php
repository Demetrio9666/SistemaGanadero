
<?php $__env->startSection('tabla'); ?>
<table id="tablaHembra" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr> 
            <th>#</th>
            <th>Código Animal</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Sexo</th> 
            <th>Acción</th> 
        </tr>
    </thead>
    <tbody>
        
        <?php $__currentLoopData = $animalhembra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td class="col1"><?php echo e($i->id); ?></td>
            <td class="col2"><?php echo e($i->animalCode); ?></td>
            <td class="col3"><?php echo e($i->age_month); ?></td>
            <td class="col4"><?php echo e($i->raza); ?></td>
            <td class="col5"><?php echo e($i->sex); ?></td>
            
            <td> <center><button type="button" class="btn btn-success btn   btselectHembra"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></center> </td>
            
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
        
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Código Animal</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Sexo</th> 
            <th>Acción</th> 
        </tr>
    </tfoot>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tablas.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/tablas/tablaAnimalesHembra.blade.php ENDPATH**/ ?>