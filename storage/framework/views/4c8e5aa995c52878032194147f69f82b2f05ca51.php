
<?php $__env->startSection('nombre_regitro'); ?>
Registro Control de Preñes
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('controlPrenes.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fecha" name="date" value="<?php echo e(old('date')); ?>">
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3" style="margin: 40px">
                    <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>" disabled=disabled >
                    <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e(old('animalCode_id')); ?>"  >
            </div>
        </div>
        
                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id="vitamina1"  name="vitamin_id" value="<?php echo e(old('vitamin_id')); ?>">
                        <option selected></option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->id); ?>" <?php if(old('vitamin_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 1 de Vitamina:</label>
                    <select class="form-control" id="vitamina2"  name="alternative1" value="<?php echo e(old('alternative1')); ?>">
                        <option selected>N/A</option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option value="<?php echo e($i->vitamin_d); ?>" <?php if(old('alternative1') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 2 de Vitamina:</label>
                    <select class="form-control" id="vitamina3"  name="alternative2" value="<?php echo e(old('alternative2')); ?>">
                        <option selected>N/A</option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($i->vitamin_d); ?>" <?php if(old('alternative2') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>  
            
        <div class="form-group">
            <label for="">Observación:</label>
            <textarea class="form-control" id="observation" rows="3" name="observation" value="<?php echo e(old('observation')); ?>" onblur="upperCase()">
            <?php echo old('observation'); ?>

            </textarea>
        </div>
    
        <div class="form-group">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e(old('date_r')); ?>">
        </div>
        <div  class="form-group">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                <option value="ACTIVO"<?php if(old('actual_state') == "ACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ACTIVO</option>
                    <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
            
                <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/controlPrenes')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/controlPrenes')); ?>" >Guardar</button>
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
                document.getElementById("fecha_r").setAttribute("min", today);
  </script>
<?php $__env->stopSection(); ?>

















<?php echo $__env->make('pregnancyC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/PregnancyC/create-PregnancyC.blade.php ENDPATH**/ ?>