
<?php $__env->startSection('nombre_regitro'); ?>
Registro de Reproducción Natural Externa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionEx.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
            <div class="col-md-4">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>">
                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                            <input type="text" class="<?php echo e($errors->has('animalCode_id') ? 'is-invalid':''); ?>" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1" name="codigo_animal" id="codigo_animal" disabled=disabled >
                            <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1" id="edad" name="age_month" disabled=disabled value="<?php echo e(old('edad')); ?>">
                            <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" name="race" disabled=disabled >
                            <input type="hidden" id="idcodi" name="animalCode_id">
                            
                            <input type="text" placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled value="<?php echo e(old('sex')); ?>">
                            <?php $__errorArgs = ['animalCode_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
            </div>
            <h5>Animal Macho Externo</h5>
            <br>
            <div class="col-md-6">
                <label for="">Código Animal:</label>
                <input type="text" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="animalCode_Exte" name="animalCode_Exte" onblur="upperCase()" value="<?php echo e(old('animalCode_Exte')); ?>">
                <?php $__errorArgs = ['animalCode_Exte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
                <label for="">Raza:</label>
                <select class="form-control <?php echo e($errors->has('race_id') ? 'is-invalid':''); ?>" id="razas" name="race_id" value="<?php echo e(old('race_id')); ?>">
                        <option></option>
                    <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->id); ?>" <?php if(old('race_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->race_d); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['race_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div> 
            <div  class="col-md-6">
                <label for="">Edad-Meses:</label>
                <input type="int" class="form-control <?php echo e($errors->has('age_month') ? 'is-invalid':''); ?>" id="age_month" name="age_month"  value="<?php echo e(old('age_month')); ?>" onChange="Validar(this.value)" >
                <?php $__errorArgs = ['age_month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
                <label for="">Sexo</label>
                <select class="form-control <?php echo e($errors->has('sex') ? 'is-invalid':''); ?>" id="sex"  name="sex" value="<?php echo e(old('sex')); ?>">
                    <option></option>
                    
                    <option value="MACHO" <?php if(old('sex') == "MACHO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MACHO</option>
                </select>
                <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div>
               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>       
            <div class="col-md-6">
                <label for="">Nombre de la Hacienda:</label>
                <input type="text" class="form-control <?php echo e($errors->has('hacienda_name') ? 'is-invalid':''); ?>" id="hacienda_name" name="hacienda_name" value="<?php echo e(old('hacienda_name')); ?>" onblur="upperCase()">
                <?php $__errorArgs = ['hacienda_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div>
               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div  class="col-md-6">
                <label for="">Estado de la Reproducción:</label>
                <select class="form-control" id="inputPassword4" name="reproduction_state" value="<?php echo e(old('reproduction_state')); ?>">
                    <option value="ESPERA"<?php if(old('reproduction_state') == "ESPERA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ESPERA</option>
                    <option value="EXITOSO"<?php if(old('reproduction_state') == "EXITOSO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>EXITOSO</option>
                    <option value="FALLIDO"<?php if(old('reproduction_state') == "FALLIDO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>FALLIDO</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Estado actual de la Información:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                    <option value="ACTIVO"<?php if(old('actual_state') == "ACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ACTIVO</option>
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
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<script>
    window.onload = function(){
              var fecha = new Date(); //Fecha actual
              var mes = fecha.getMonth()+1; //obteniendo mes
              var dia = fecha.getDate(); //obteniendo dia
              var ano = fecha.getFullYear(); //obteniendo año
              if(dia<10)
                dia='0'+dia; //agrega cero si el menor de 10
              if(mes<10)
                mes='0'+mes //agrega cero si el menor de 10
              document.getElementById('fecha_r').value=ano+"-"+mes+"-"+dia;
            }
  
            ////bloqueo de fechas futuras
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("fecha_r").setAttribute("max", today);
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('file_reproductionME.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/create-external_M.blade.php ENDPATH**/ ?>