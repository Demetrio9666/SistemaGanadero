
<?php $__env->startSection('nombre_regitro'); ?>
Editar Control de preñez Inactiva
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('inactivos.controlPrenes.update',$pre->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Vacunacion:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($pre->date); ?>"disabled=disabled>
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-outline-secondary" disabled=disabled type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text"  placeholder="Código Animal"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pre->animalCode_id == $i->id ): ?>
                                         value =" <?php echo e($i->animalCode); ?> "
                                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                       
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($pre->animalCode_id); ?>">
                        
                </div>
        </div>
        <div class="form-group">
            <label for="">Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="vitamin_id"   value="<?php echo e($pre->vitamin_id); ?>" disabled=disabled>
                <option selected></option>
                <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($i->id); ?>" <?php if($pre->vitamin_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>  
    
        <div class="form-group">
            <label for="">Alternativa 1 de Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="alternative1"   value="<?php echo e($pre->alternative1); ?>" disabled=disabled>
                <option selected>N/A</option>
                <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <option <?php echo e($i->id); ?>  <?php if($pre->alternative1 == $i->vitamin_d ): ?> value= "<?php echo e($i->vitamin_d); ?>"  selected  <?php endif; ?>><?php echo e($i->vitamin_d); ?> </option>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>  
        <div class="form-group">
            <label for="">Alternativa 2 de Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="alternative2"   value="<?php echo e($pre->alternative2); ?>" disabled=disabled>
                <option selected>N/A</option>
                <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <option <?php echo e($i->id); ?>  <?php if($pre->alternative2 == $i->vitamin_d ): ?> value= "<?php echo e($i->vitamin); ?>" selected  <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>  
        <div class="form-group">
            <label for="">Observación:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observation" disabled=disabled><?php echo e($pre->observation); ?> </textarea>
        </div>
    
        <div class="form-group">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($pre->date_r); ?>" disabled=disabled>
        </div>
        <div  class="form-group">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($pre->actual_state); ?>">
                <option value="DISPONIBLE" <?php if( $pre->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                <option value="INACTIVO" <?php if( $pre->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
         <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('inactivos/controlPrenes')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('inactivos/controlPrenes')); ?>" >Guardar</button>
            </div>
        </center>   
        
    </div>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pregnancyC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/pregnancyC/edit-inactivo.blade.php ENDPATH**/ ?>