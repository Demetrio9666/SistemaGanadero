
<?php $__env->startSection('nombre_regitro'); ?>
Editar Control de Vacunación
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('inactivos.controlVacunas.update',$vacunaC->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Vacunación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($vacunaC->date); ?>" disabled=disabled>
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 33px">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" disabled=disabled>Buscar</button>
                        <span class="input-group-text" id="basic-addon1">Codigo</span>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($vacunaC->animalCode_id == $i->id ): ?>
                                         value =" <?php echo e($i->animalCode); ?> "
                                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                        <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($vacunaC->animalCode_id); ?>">
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Vacuna:</label>
            <select class="form-control" id="inputPassword4"  name="vaccine_id"   value="<?php echo e($vacunaC->vaccine_id); ?>" disabled=disabled>
                <option selected></option>
                <?php $__currentLoopData = $vacuna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($i->id); ?>" <?php if($vacunaC->vaccine_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->vaccine_d); ?></option>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>  
        <div  class="col-md-6">
            <label for="">Fecha de Segunda Docis:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($vacunaC->date_r); ?>" disabled=disabled>
        </div>
        <div  class="col-md-6">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($vacunaC->actual_state); ?>">
                <option value="DISPONIBLE" <?php if( $vacunaC->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                <option value="INACTIVO" <?php if( $vacunaC->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div  class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('inactivos/controlVacunas')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('inactivos/controlVacunas')); ?>" >Guardar</button>
            </div>
        </center>
       

    </div>
    
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vaccineC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccineC/edit-inactivo.blade.php ENDPATH**/ ?>