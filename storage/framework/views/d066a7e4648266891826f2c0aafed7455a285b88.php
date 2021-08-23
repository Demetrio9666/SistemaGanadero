
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Partos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
            <tr>
                <th>Fecha</th>
                <th>Código del Animal</th>
                <th>Cant.Machos </th>
                <th>Cant.Hembras</th>
                <th>Cant.Muertos</th>
                <th>Estado Animal</th>
                <th>Tipo de Parto</th>
                <th>Estado Actual</th> 
            </tr> 
    </thead>
    <tbody>  
        <?php $__currentLoopData = $par; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->date); ?></td>
            <td><?php echo e($i->animal); ?></td>
            <td ><?php echo e($i->male); ?></td>
            <td ><?php echo e($i->female); ?></td>
            <td ><?php echo e($i->dead); ?></td>
            <td ><?php echo e($i->mother_status); ?></td>
            <td ><?php echo e($i->partum_type); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/pdf.blade.php ENDPATH**/ ?>