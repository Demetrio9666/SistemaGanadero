
<head>
    <?php $__env->startSection('css'); ?>
        
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    <?php $__env->startSection('title'); ?>
    <?php $__env->startSection('content_header'); ?>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>  
                <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                <tr>
                    <td ><?php echo e($i->name); ?></td>
                    <td><?php echo e($i->email); ?></td>
                
                    <td>
                        <a class="btn btn-primary" href="<?php echo e(route('usuarios.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                        <form action="<?php echo e(route('usuarios.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?> 
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>