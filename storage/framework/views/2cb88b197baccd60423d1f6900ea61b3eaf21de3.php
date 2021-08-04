
<?php $__env->startSection('nombre_regitro'); ?>
Editar Reproducción Natural Externa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action=" <?php echo e(route('fichaReproduccionEx.update',$ext->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="form-group">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="desp" name="date" value="<?php echo e($ext->date); ?>">
        </div>
    
        <div class="form-group">
            <h5>Animal Hembra</h5>
            <br>
                <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ext->animalCode_id == $i->id ): ?>
                                value =" <?php echo e($i->animalCode); ?> "
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
    

                        <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled
                        <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ext->animalCode_id == $i->id ): ?>
                                value =" <?php echo e($i->race_d); ?> "
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
    
                        <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e($ext->animalCode_id); ?>">
            
                             <input type="text" placeholder="Edad"  id="edad" name="age_month" disabled=disabled
                            <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ext->animalCode_id == $i->id ): ?>
                                    value =" <?php echo e($i->age_month); ?> "
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  >
     

                            <input type="text" placeholder="Sexo"  id="sexo" name="sex" disabled=disabled
                            <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ext->animalCode_id == $i->id ): ?>
                                    value =" <?php echo e($i->sex); ?> "
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >

    
                </div>
    
        </div>
        <h5>Animal Macho Externo</h5>
            <br>
        <div class="col-md-6">
            <label for="">Código Animal Externo:</label>
            <input type="text" class="form-control" id="animalCode_Exte" name="animalCode_Exte" value="<?php echo e($ext->animalCode_Exte); ?>" onblur="upperCase()">
        </div>
    
    
        <div class="col-md-6">
            <label for="">Raza:</label>
            <select class="form-control" id="razas" name="race_id"  value="<?php echo e($ext->race_id); ?>">
                    <option selected>Seleccione la Raza</option>
                <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($i->id); ?>" <?php if($ext->race_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->race_d); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>  
    
    
    
        <div class="col-md-6">
            <label for="">Edad-meses:</label>
            <input type="int" class="form-control" name="age_month" value="<?php echo e($ext->age_month); ?>">
        </div>  
    
    
        <div class="col-md-6">
            <label for="">Sexo</label>
            <select class="form-control" id="sex"  name="sex" value="<?php echo e($ext->sex); ?>">
                <option>Seleccione</option>
                
                <option value="MACHO" <?php if($ext->sex == "MACHO"): ?> selected <?php endif; ?>>MACHO</option>
            </select>
        </div>   
    
    
        <div class="col-md-6">
            <label for="">Nombre Hacienda:</label>
            <input type="text" class="form-control" id="hacienda_name" name="hacienda_name" value="<?php echo e($ext->hacienda_name); ?>" onblur="upperCase()">
        </div> 
        <div  class="col-md-6">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state"  value="<?php echo e($ext->actual_state); ?>">
                <option value="DISPONIBLE" <?php if( $ext->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                <option value="INACTIVO" <?php if( $ext->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
        
        
        <center>
            <div class="form-group" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/fichaReproduccionEx')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/fichaReproduccionEx')); ?>" >Guardar</button>
            </div>
        </center>

    </div>
    
</form>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('file_reproductionME.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/edit-external_M.blade.php ENDPATH**/ ?>