

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
                <?php echo $__env->yieldContent('nombre_card'); ?></h3>
            </div>
            <div class="col-lg-3 col-6">
                    <a type="button" title="Agregar nuevo registro" class="btn btn-success " style="margin: 10px" id="button-addon1" href= <?php echo $__env->yieldContent('boton_registro'); ?>><i class="fas fa-plus-square"></i></a>
                    <a type="button" title="Registros inactivos" class="btn btn-warning " style="margin: 10px" id="button-addon1" href= <?php echo $__env->yieldContent('boton_reciclaje'); ?>><i class="fas fa-trash"></i></a>
                    <a type="button" title="Descarga reportes en Excel" class="btn btn-success " style="margin: 10px"  id="button-addon1" href=<?php echo $__env->yieldContent('boton_reporte_excel'); ?>><i class="fas fa-file-excel"></i></a>
                    <a type="button" title="Descarga reportes en PDF" class="btn btn-danger "  id="button-addon1" href=<?php echo $__env->yieldContent('boton_reporte_pdf'); ?>><i class="fas fa-file-pdf"></i></a>  
            </div>
            <div class="card">
                <div class="card-body">
                        <div class="titulo "><h1> <?php echo $__env->yieldContent('nombre_tabla'); ?></h1></div>
                        <?php echo $__env->yieldContent('tabla'); ?>
                        <?php echo $__env->yieldContent('usuario'); ?>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->yieldContent('js'); ?>


       


        

       
        

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/layouts/baseTablas.blade.php ENDPATH**/ ?>