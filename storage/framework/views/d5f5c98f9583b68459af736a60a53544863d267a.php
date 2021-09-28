

<?php $__env->startSection('content_header'); ?>
<label>Hora:</label>
<br>
<div id="reloj" class="reloj">00 : 00 : 00</div>
<br>
<br>
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book-open"></i>
                Roles</h3>
            </div>
            <div class="col-lg-3 col-6">
                    <a type="button" title="Agregar nuevo registro" class="btn btn-success " style="margin: 10px" id="button-addon1" href="<?php echo e(url('rol/create')); ?>"><i class="fas fa-plus-square"></i></a>
                    
            </div>
            <div class="card">
                <div class="card-body">
                        <div class="titulo "><h1> Registros de Roles</h1></div>
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
                                    <td ><?php echo e($i->rol); ?></td>
                                    <td>
                                        <center>
                                            <a class="btn btn-primary" href="<?php echo e(route('rol.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo e(route('rol.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?> 
                                                <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <button type="submit"  class="btn btn-danger" value="Eliminar"  >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                        </center>
                                       
                                        </form>                         
                                    </td>  
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                           
                        </table>
                        <?php echo $__env->yieldContent('usuario'); ?>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php if(session('Infor')=='ok' ): ?>
<script>
        Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'El rol se guardo',
        showConfirmButton: false,
        timer: 1500
  })

</script>
<?php endif; ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/index-rol.blade.php ENDPATH**/ ?>