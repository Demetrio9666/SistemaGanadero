
<?php $__env->startSection('nombre_regitro'); ?>
         Registro de Tratamientos 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>

        <form action="<?php echo e(route('fichaTratamiento.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                    <div class="col-md-6">
                        <label for="">Fecha de Tratamiento:</label>
                        <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha" name="date" onChange="fecha(this.value)" >
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

                    <div class="col-md-6">
                    
                            <div class="input-group mb-3" style="margin: 40px">
                                    <button class="btn btn-primary"  type="button"  id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                   
                                    <input type="text"  placeholder="Código Animal" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                                    <input type="hidden" class="<?php echo e($errors->has('animalCode_id') ? 'is-invalid':''); ?>" id="idcodi" name="animalCode_id">
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
                    <div class="col-md-6">
                        <label for="">Enfermedad:</label>
                        <select class="form-control <?php echo e($errors->has('disease') ? 'is-invalid':''); ?>" id=""  name="disease" value="<?php echo e(old('disease')); ?>">
                            <option selected ></option>
                            <option value="FALTA DE APETITO" <?php if(old('disease') == "FALTA DE APETITO"): ?> <?php echo e('selected'); ?><?php endif; ?>>FALTA DE APETITO</option>
                            <option value="HERIDA" <?php if(old('disease') == "HERIDA"): ?> <?php echo e('selected'); ?><?php endif; ?>>HERIDA</option>
                            <option value="OTRAS CAUSAS" <?php if(old('disease') == "OTRAS CAUSAS"): ?> <?php echo e('selected'); ?><?php endif; ?>>OTRAS CAUSAS</option>
                    </select>
                    <?php $__errorArgs = ['disease'];
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
                        <label for="">Detalle:</label>
                        <textarea class="form-control <?php echo e($errors->has('detail') ? 'is-invalid':''); ?>" id="detalle" rows="3" name="detail" onblur="upperCase()" >
                        <?php echo old('detail'); ?>

                        </textarea>
                        <?php $__errorArgs = ['detail'];
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
                        <label for=""> Antibióticos:</label>
                        <select class="form-control" id=""  name="antibiotic_id" value="<?php echo e(old('antibiotic_id')); ?>">
                            <option selected value="">N/A</option>
                            <?php $__currentLoopData = $anti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($i->id); ?>" <?php if(old('antibiotic_id') == $i->id): ?> <?php echo e('selected'); ?><?php endif; ?>><?php echo e($i->antibiotic_d); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                   
                    </div>   

                    <div class="col-md-6">
                        <label for="">Vitamina:</label>
                        <select class="form-control" id=""  name="vitamin_id">
                            <option selected value="" >N/A</option>
                            <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($i->id); ?>"<?php if(old('vitamin_id') == $i->id): ?> <?php echo e('selected'); ?><?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  
                    </div>  

                    <div class="form-group">
                        <label for="">Tratamiento:</label>
                        <textarea class="form-control <?php echo e($errors->has('treatment') ? 'is-invalid':''); ?>" id="tratamiento" rows="3" name="treatment" onblur="upperCase()" >
                        <?php echo old('treatment'); ?>

                        </textarea>
                        <?php $__errorArgs = ['treatment'];
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
                        <label for="">Recuperación:</label>
                        <select class="form-control" id="inputPassword4" name="recovery">
                            <option value="NO">NO</option>
                            <option value="SI">SI</option>
                        </select>
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
                        <label for="">Estado actual de la Información:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
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
                    <center>
                        <div class="col-md-6-self-center" style="margin: 40px">
                            <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/fichaTratamiento')); ?>">Cancelar</a>
                            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaTratamiento')); ?>" >Guardar</button>
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
            document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
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
          document.getElementById("fecha").setAttribute("max", today);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('file_treatment.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_treatment/create-treatment.blade.php ENDPATH**/ ?>