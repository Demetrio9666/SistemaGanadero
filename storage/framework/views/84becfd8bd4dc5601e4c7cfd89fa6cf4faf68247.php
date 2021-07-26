
<head>
    <?php $__env->startSection('css'); ?>

    <?php $__env->stopSection(); ?> 
</head>
  <body>
    
    <?php $__env->startSection('title'); ?>
   
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('fichaReproduccionM/create')); ?>"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('inactivos/fichaReproduccionM')); ?>"><i class="fas fa-recycle"></i></a>
    <a type="button" class="btn-lg btn-success float-right"  id="button-addon1" href="<?php echo e(url('exportar-excel')); ?>"><i class="fas fa-file-excel"></i></a>
    <a type="button" class="btn-lg btn-danger float-right"  id="button-addon1" href="<?php echo e(url('descarga-pdf')); ?>"><i class="fas fa-file-pdf"></i></a> 
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Reproducción por Monta Natural Interna</h1></div>
                      <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>             
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Código del Animal</th>
                                <th>Raza </th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Código del Animal</th>
                                <th>Raza</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado Actual</th> 
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $re_MI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                            <tr>
                                <td><?php echo e($i->fecha_MI); ?></td>
                                <td><?php echo e($i->animal_h_MI); ?></td>
                                <td><?php echo e($i->raza_h_MI); ?></td>
                                <td ><?php echo e($i->edad_h); ?></td>
                                <td ><?php echo e($i->sexo_h); ?></td>
                                <td><?php echo e($i->animal_m_MI); ?></td>
                                <td><?php echo e($i->raza_m_MI); ?></td>
                                <td><?php echo e($i->edad_m); ?></td>
                                <td ><?php echo e($i->sexo_m); ?></td>
                                <td ><?php echo e($i->actual_state); ?></td>
                                <td>
                                    <a class="btn btn-primary  " href="<?php echo e(route('fichaReproduccionM.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                                            
                                </td>  
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                   
                        </tbody>
                        
                    </table>
                    </div>
                </div>
    <?php $__env->stopSection(); ?>

</body>
<?php $__env->startSection('js'); ?>
           
<?php $__env->stopSection(); ?>




<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionM/index-reproduction.blade.php ENDPATH**/ ?>