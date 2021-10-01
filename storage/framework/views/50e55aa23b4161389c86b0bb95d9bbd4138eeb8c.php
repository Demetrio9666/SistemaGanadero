
<?php $__env->startSection('nombre_tabla'); ?>
Fichas de Tratamientos Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tabla'); ?>
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
                            <th>Recuperación</th>
                            <th>Estado Actual</th> 
                        </tr> 
                </thead>
                <tbody>  
                    <?php $__currentLoopData = $tra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
                    <tr>
                        <td><?php echo e($i->date); ?></td>
                        <td><?php echo e($i->animal); ?></td>
                        <td><?php echo e($i->disease); ?></td>
                        <td><?php echo e($i->detail); ?></td>
                        <td><?php echo e($i->anti); ?></td>
                        <td><?php echo e($i->vi); ?></td>
                        <td><?php echo e($i->treatment); ?></td>
                        <td><?php echo e($i->recovery); ?></td>
                        <td><?php echo e($i->actual_state); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
<?php $__env->stopSection(); ?>
<form>
</form>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_treatment/pdf.blade.php ENDPATH**/ ?>