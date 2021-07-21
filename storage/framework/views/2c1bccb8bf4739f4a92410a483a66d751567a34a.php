
<head>
    <?php $__env->startSection('css'); ?>
       
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    
    <?php $__env->startSection('title'); ?>
   
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('controlVacuna/create')); ?>"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('inactivos/controlVacunas')); ?>"><i class="fas fa-recycle"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th></th>
                    <th>Fecha de la Vacunacion</th>
                    <th>Código del Animal</th>
                    <th>Vacuna</th>
                    <th>Fecha de re-vacunacion</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                <?php $__currentLoopData = $vacunaC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                <tr>
                    <td><?php echo e($i->id); ?></td>
                    <td><?php echo e($i->date); ?></td>
                    <td ><?php echo e($i->animal); ?></td>
                    <td ><?php echo e($i->vacuna); ?></td>
                    <td ><?php echo e($i->date_r); ?></td>
                    <td ><?php echo e($i->actual_state); ?></td>

                    <td>
                        <a class="btn btn-primary" href="<?php echo e(route('controlVacuna.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                                
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccineC/index-vaccineC.blade.php ENDPATH**/ ?>