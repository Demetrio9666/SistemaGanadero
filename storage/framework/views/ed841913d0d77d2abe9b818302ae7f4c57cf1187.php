
<head>
    <?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    <?php $__env->startSection('title'); ?>
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('/fichaReproduccionM')); ?>"><i class="fas fa-arrow-left"></i></a>

                <div class="card">
                    <h1 style="margin: 15px">Monta Interna</h1>
                    <div class="card-body">
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
                                    <a class="btn btn-primary  " href="<?php echo e(route('inactivos.fichaReproduccionM.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                    <form action="<?php echo e(route('inactivos.fichaReproduccionM.destroy',$i->id)); ?>"  class="d-inline  formulario-eliminar"  method="POST">
                                        <?php echo method_field('DELETE'); ?> 
                                        <?php echo csrf_field(); ?>
                                        <button type="submit"  class="btn btn-danger" value="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>                         
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




<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionM/index-inactivo.blade.php ENDPATH**/ ?>