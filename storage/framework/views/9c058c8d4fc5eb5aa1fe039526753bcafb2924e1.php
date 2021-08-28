
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Reproducción por Monta Natural Externa Inactivos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%"> 
    <thead>            
        <tr>
            <th>Fecha de Registro</th>
            <th>Código Animal</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Código Externo</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Hacienda</th>
            <th>Estado Actual</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $ext; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
        <tr>
            <td ><?php echo e($i->date); ?></td>
            <td><?php echo e($i->animalCode); ?></td>
            <td><?php echo e($i->raza); ?></td>
            <td><?php echo e($i->edad); ?></td>
            <td><?php echo e($i->sexo); ?></td>
            <td><?php echo e($i->animalCode_Exte); ?></td>
            <td><?php echo e($i->race_d); ?></td>
            <td><?php echo e($i->age_month); ?></td>
            <td><?php echo e($i->sex); ?></td>
            <td><?php echo e($i->hacienda_name); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/pdf-inactivo.blade.php ENDPATH**/ ?>