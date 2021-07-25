

<head>
    <?php $__env->startSection('css'); ?>
        
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    
    <?php $__env->startSection('title'); ?>
   
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('fichaTratamiento/create')); ?>"><i class="fas fa-plus-square"></i></a>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('inactivos/fichaTratamientos')); ?>"><i class="fas fa-recycle"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de Tratamiento</th>
                    <th>Código del Animal</th>
                    <th>Enfermedad </th>
                    <th>Detalle</th>
                    <th>Antibiótico</th>
                    <th>Vitamina</th>
                    <th>Tratamiento</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                <tr>
                    <td><?php echo e($i->date); ?></td>
                    <td><?php echo e($i->animal); ?></td>
                    <td><?php echo e($i->disease); ?></td>
                    <td ><?php echo e($i->detail); ?></td>
                    <td ><?php echo e($i->anti); ?></td>
                    <td ><?php echo e($i->vi); ?></td>
                    <td ><?php echo e($i->treatment); ?></td>
                    <td ><?php echo e($i->actual_state); ?></td>
                    <td>
                        <a class="btn btn-primary  " href="<?php echo e(route('fichaTratamiento.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                                
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_treatment/index-treatment.blade.php ENDPATH**/ ?>