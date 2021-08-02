
<head>
        <?php $__env->startSection('css'); ?>
           
        <?php $__env->stopSection(); ?> 
</head>
    <?php $__env->startSection('content_header'); ?>
                <a type="button" class="btn-lg btn-success " style="margin: 10px" id="button-addon1" href="<?php echo e(url('fichaAnimal/create')); ?>"><i class="fas fa-plus-square"></i></a>
                <a type="button" class="btn-lg btn-warning " style="margin: 10px" id="button-addon1" href="<?php echo e(url('inactivos/fichaAnimales')); ?>"><i class="fas fa-trash"></i></a>
                
                <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="<?php echo e(url('exportar-excel-fichaAnimal')); ?>"><i class="fas fa-file-excel"></i></a>
                <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="<?php echo e(url('descarga-pdf-fichaAnimal')); ?>"><i class="fas fa-file-pdf"></i></a>
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Animales</h1></div>
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
                                    <th>localización</th>
                                    <th>Estado Actual</th> 
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
                                    <td ><?php echo e($i->ubicacion); ?></td>
                                    <td ><?php echo e($i->actual_state); ?></td>
                                    <td ><?php echo e($i->conceived); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(route('fichaAnimal.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                                             
                                    </td>  
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_animale/index-animale.blade.php ENDPATH**/ ?>