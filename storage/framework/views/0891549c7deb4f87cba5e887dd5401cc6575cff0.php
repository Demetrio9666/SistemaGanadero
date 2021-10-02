

<?php $__env->startSection('nombre_card'); ?>
Registros de Reproducción por Monta Natural Externas Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_atras'); ?>
"<?php echo e(url('/fichaReproduccionEx')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_excel'); ?>
"<?php echo e(url('exportar-excel-fichaReproduccionEx-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('boton_reporte_pdf'); ?>
"<?php echo e(url('descarga-pdf-fichaReproduccionEx-Inactivos')); ?>"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Reproducción por Monta Natural Externa Inactivos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>             
        <tr>
            <th>Fecha de Registro</th>
            <th>Codigo Animal</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Código Externo</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Hacienda</th>
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th>  
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        <?php $__currentLoopData = $ext; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
        <tr>
            <td ><?php echo e($i->date); ?></td>
            <td><?php echo e($i->animalCode); ?></td>
            <td><?php echo e($i->raza); ?></td>
            <td><?php echo e($i->edad); ?></td>
            <td><?php echo e($i->sexo); ?></td>
            <td><?php echo e($i->animalCode_Exte); ?></td>
            <td><?php echo e($i->race_d); ?></td>
            <td><?php echo e($i->age_month); ?></td>
            <td><?php echo e($i->sex); ?></td>
            <td><?php echo e($i->hacienda_name); ?></td>
            <td ><?php echo e($i->reproduction_state); ?></td>
            <td ><?php echo e($i->actual_state); ?></td>
            <td>
              <center>
                <a class="btn btn-primary" href="<?php echo e(route('inactivos.fichaReproduccionEx.edit',$i->id)); ?>" ><i class="fas fa-edit"></i></a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fichaReproduccionEx.destroy')): ?>
                <form action="<?php echo e(route('inactivos.fichaReproduccionEx.destroy',$i->id)); ?>" method="POST" class="d-inline  formulario-eliminar">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?> 
                    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <button type="submit"  class="btn btn-danger" value="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                    
                <?php endif; ?>
              </center>
               
                  
            </td>  
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
</table>
<?php $__env->stopSection(); ?>















   
<?php echo $__env->make('layouts.baseTablasInactivas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/index-inactivo.blade.php ENDPATH**/ ?>