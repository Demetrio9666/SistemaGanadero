
<?php $__env->startSection('nombre_regitro'); ?>
Registro de Reproducción Natural Externa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionEx.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
            <div class="form-group">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control" id="" name="date" value="<?php echo e(old('date')); ?>">
            </div>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                            <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                            <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >
                            <input type="hidden" id="idcodi" name="animalCode_id">
                            <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" id="edad" name="age_month" disabled=disabled value="<?php echo e(old('edad')); ?>">
                            <input type="text" placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled value="<?php echo e(old('sex')); ?>">
                    </div>
            </div>
            <h5>Animal Macho Externo</h5>
            <br>
            <div class="col-md-6">
                <label for="">Código Animal:</label>
                <input type="text" class="form-control" id="animalCode_Exte" name="animalCode_Exte" onblur="upperCase()" value="<?php echo e(old('animalCode_Exte')); ?>">
            </div>
            <div class="col-md-6">
                <label for="">Raza:</label>
                <select class="form-control" id="razas" name="race_id" value="<?php echo e(old('race_id')); ?>">
                        <option></option>
                    <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->id); ?>" <?php if(old('race_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->race_d); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div> 
            <div  class="col-md-6">
                <label for="">Edad-Meses:</label>
                <input type="int" class="form-control" id="age_month" name="age_month"  value="<?php echo e(old('age_month')); ?>" onChange="Validar(this.value)" >
            </div>
            <div class="col-md-6">
                <label for="">Sexo</label>
                <select class="form-control" id="sex"  name="sex" value="<?php echo e(old('sex')); ?>">
                    <option></option>
                    
                    <option value="MACHO" <?php if(old('sex') == "MACHO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MACHO</option>
                </select>
            </div>       
            <div class="col-md-6">
                <label for="">Nombre de la Hacienda:</label>
                <input type="text" class="form-control" id="hacienda_name" name="hacienda_name" value="<?php echo e(old('hacienda_name')); ?>" onblur="upperCase()">
            </div>
            <div class="col-md-6">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                    <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                    <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
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

<?php echo $__env->make('file_reproductionME.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/create-external_M.blade.php ENDPATH**/ ?>