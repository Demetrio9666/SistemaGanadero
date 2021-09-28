
<?php $__env->startSection('nombre_regitro'); ?>
Editar Tratamientos de animales
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaTratamiento.update',$tra->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
             <div class="col-md-6">
                <label for="">Fecha de Tratamiento:</label>
                <input type="date" class="form-control" id="fecha" name="date" value="<?php echo e($tra->date); ?>">
            </div>
            <div class="col-md-6">
                
                    <div class="input-group mb-3" style="margin: 40px">
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                           
                            <input type="text"  placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                            <?php $__currentLoopData = $animalT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tra->animalCode_id == $i->id ): ?>
                                            value =" <?php echo e($i->animalCode); ?> "
                                        <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> 
                            <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($tra->animalCode_id); ?>">
                    </div>
            </div>        
            <div class="form-group">
                <label for="">Enfermedad:</label>
                <select class="form-control" id=""  name="disease"  value="<?php echo e($tra->disease); ?>">
                    <option selected ></option>
                    <option value="FALTA DE APETITO" <?php if($tra->disease == "FALTA DE APETITO" ): ?> selected <?php endif; ?>>FALTA DE APETITO</option>
                    <option value="HERIDA" <?php if($tra->disease == "HERIDA" ): ?> selected <?php endif; ?>>HERIDA</option>
                    <option value="OTRAS CAUSAS" <?php if($tra->disease == "OTRAS CAUSAS" ): ?> selected <?php endif; ?>>OTRAS CAUSAS</option>
            </select>
            </div>
            <div class="form-group">
                <label for="">Detalle:</label>
                <textarea class="form-control"  id="detalle" rows="3" name="detail" onblur="upperCase()"><?php echo e($tra->detail); ?> </textarea>
            </div>

            <div class="col-md-6">
                <label for=""> Antibióticos:</label>
                <select class="form-control" id=""  name="antibiotic_id"   value="<?php echo e($tra->antibiotic_id); ?>">
                    <option selected value="">N/A</option>
                    <?php $__currentLoopData = $anti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->id); ?>" <?php if($tra->antibiotic_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->antibiotic_d); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>   

            <div class="col-md-6">
                <label for="">Vitamina:</label>
                <select class="form-control" id=""  name="vitamin_id"   value="<?php echo e($tra->vitamin_id); ?>">
                    <option selected value="" >N/A</option>
                    <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->id); ?>" <?php if($tra->vitamin_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>  

            <div class="form-group">
                <label for="">Tratamiento:</label>
                <textarea class="form-control" id="tratamiento" rows="3" name="treatment" onblur="upperCase()"> <?php echo e($tra->treatment); ?></textarea>
            </div>
            <div class="form-group">
                        <label for="">Recuperación:</label>
                        <select class="form-control" id="inputPassword4" name="recovery" value="<?php echo e($tra->recovery); ?>">
                            <option value="NO" <?php if( $tra->recovery == "NO"): ?> selected <?php endif; ?>>NO</option>
                            <option value="SI" <?php if( $tra->recovery == "SI"): ?> selected <?php endif; ?>>SI</option>
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
            <div  class="form-group">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($tra->actual_state); ?>">
                    <option value="DISPONIBLE" <?php if( $tra->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                    <option value="INACTIVO" <?php if( $tra->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
                </select>
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





<?php echo $__env->make('file_treatment.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_treatment/edit-treatment.blade.php ENDPATH**/ ?>