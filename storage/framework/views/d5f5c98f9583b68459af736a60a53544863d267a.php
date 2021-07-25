
<head>
    <?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?> 
</head>
  <body>
    
    <?php $__env->startSection('title'); ?>
   
    <?php $__env->startSection('content_header'); ?>
  
    <a type="button" class="btn-lg btn-success " style="margin: 10px" id="button-addon1" href="<?php echo e(url('rol/create')); ?>"><i class="fas fa-plus-square"></i></a>
    <div class="card">
        <div class="card-body">
          <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>             
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>  
                <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                <tr >
                    <td><?php echo e($i->id); ?></td>
                    <td ><?php echo e($i->name); ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo e(route('rol.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                        <form action="<?php echo e(route('rol.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?> 
                            <button type="submit"  class="btn btn-danger" value="Eliminar"  >
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
    <?php if(session('Infor')=='ok' ): ?>
    <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'EL ROL SE A GUARDADO ',
            showConfirmButton: false,
            timer: 1500
      })

    </script>

    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/index-rol.blade.php ENDPATH**/ ?>