
<head>
    <?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    <?php $__env->startSection('title'); ?>
    <?php $__env->startSection('content_header'); ?>
    <a type="button" class="btn-lg btn-success" style="margin: 10px" id="button-addon1" href="<?php echo e(url('/fichaParto')); ?>"><i class="fas fa-arrow-left"></i></a>
    
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Fecha de control</th>
                    <th>Código del Animal</th>
                    <th>Cant.Machos </th>
                    <th>Cant.Hembras</th>
                    <th>Cant.Muertos</th>
                    <th>Estado Animal</th>
                    <th>Tipo de Parto</th>
                    <th>Estado Actual</th> 
                    <th>Acción</th>
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
                    <td>
                        <a class="btn-lg btn-primary d-grid gap-2 d-md-block " href="<?php echo e(route('inactivos.fichaPartos.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                        <form action="<?php echo e(route('inactivos.fichaPartos.destroy',$i->id)); ?>"  class="d-inline  formulario-eliminar  "  method="POST">
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/index-inactivo.blade.php ENDPATH**/ ?>