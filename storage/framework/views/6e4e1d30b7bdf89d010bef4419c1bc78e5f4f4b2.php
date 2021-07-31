
<head>
    <?php $__env->startSection('css'); ?>
   
    <?php $__env->stopSection(); ?> 
</head>
<body>

    <?php $__env->startSection('title'); ?>
   
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('fichaReproduccionA/create')); ?>"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('inactivos/fichaReproduccionA')); ?>"><i class="fas fa-recycle"></i></a>
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="<?php echo e(url('exportar-excel-fichaReproduccionA')); ?>"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="<?php echo e(url('descarga-pdf-fichaReproduccionA')); ?>"><i class="fas fa-file-pdf"></i></a>    
            <div class="accordion-body">
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Reproducción Artificial</h1></div>
                      <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>             
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Código del Animal</th>
                                <th>Raza </th>
                                <th>Tipo de Reproducción Artificial</th>
                                <th>Raza Material Genético</th>
                                <th>Estado Actual</th> 
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $re_A; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                            <tr>
                                <td><?php echo e($i->fecha_A); ?></td>
                                <td><?php echo e($i->animalA); ?></td>
                                <td><?php echo e($i->raza_h); ?></td>
                                <td ><?php echo e($i->tipo); ?></td>
                                <td ><?php echo e($i->raza_m); ?></td>
                                <td ><?php echo e($i->actual_state); ?></td>
                                <td>
                                    <a class="btn btn-primary  " href="<?php echo e(route('fichaReproduccionA.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                                            
                                </td>  
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </table>
                    </div>
                
            </div>
          </div>


    <?php $__env->stopSection(); ?>

</body>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/index-reproductionA.blade.php ENDPATH**/ ?>