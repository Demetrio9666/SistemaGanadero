
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
                Actividades de Usuarios
            </div>
        </div>
                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>             
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Pantalla</th>
                            <th>Dato</th>
                            <th>Fecha creación</th>
                            <th>Fecha actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr>
                            <td><?php echo e($i->log_name); ?></td>
                            <td><?php echo e($i->email); ?></td>
                            <td ><?php echo e($i->rol); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                            <td ><?php echo e($i->view); ?></td>
                            <td ><?php echo e($i->data); ?></td>
                            <td ><?php echo e($i->created_at); ?></td>
                            <td ><?php echo e($i->updated_at); ?></td>  
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/log-activity/log.blade.php ENDPATH**/ ?>