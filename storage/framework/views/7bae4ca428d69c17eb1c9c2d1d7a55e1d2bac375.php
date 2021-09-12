
<?php $__env->startSection('nombre_card'); ?>
        Registros Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_registro'); ?>
"<?php echo e(url('fichaAnimal/create')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reciclaje'); ?>
"<?php echo e(url('inactivos/fichaAnimales')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-fichaAnimal')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-fichaAnimal')); ?>"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Animales Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
        <tr>
            <th>Código Animal</th>
            <th>Foto</th>
            <th>Fecha Nacimiento</th>
            <th>Raza</th>
            <th>Sexo</th>
            <th>Etapa</th>
            <th>Origen</th>
            <th>Edad-meses</th>
            <th>Salud</th>
            <th>Embarazo</th>
            <th>Estado Actual</th> 
            <th>localización</th>
            <th>Concebido</th>  
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td><?php echo e($i->animalCode); ?></td>
            <td>
                <img src="<?php echo e(asset($i->url)); ?>" width="50px" height="50px">
            </td>
            <td ><?php echo e($i->date); ?></td>
            <td ><?php echo e($i->raza); ?></td>
            <td ><?php echo e($i->sex); ?></td>
            <td ><?php echo e($i->stage); ?></td>
            <td ><?php echo e($i->source); ?></td>
            <td ><?php echo e($i->age_month); ?></td>
            <td ><?php echo e($i->health_condition); ?></td>
            <td ><?php echo e($i->gestation_state); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td ><?php echo e($i->ubicacion); ?></td>
            <td ><?php echo e($i->conceived); ?></td>
            <td>
                <center>
                    <a class="btn btn-primary" href="<?php echo e(route('fichaAnimal.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                </center>
                
                                     
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.baseTablas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_animale/index-animale.blade.php ENDPATH**/ ?>