
<?php $__env->startSection('nombre_regitro'); ?>
Editar Peso de Animales
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('controlPeso.update',$pesoC->id)); ?>"   method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fecha" name="date" value="<?php echo e($pesoC->date); ?>">
        </div>
        <div class="col-md-6">
           
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text"  placeholder="Código Animal" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pesoC->animalCode_id == $i->id ): ?>
                                         value ="<?php echo e($i->animalCode); ?>"
                                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($pesoC->animalCode_id); ?>">
                        
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Peso KG:</label>
            <input type="text" class="form-control" id="peso" name="weigtht" value="<?php echo e($pesoC->weigtht); ?>" onChange="ValidarPeso(this.value)">
        </div>
        
        <div class="col-md-6">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($pesoC->date_r); ?>">
        </div>
        <div  class="col-md-6">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($pesoC->actual_state); ?>">
                <option value="DISPONIBLE" <?php if( $pesoC->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                    <option value="INACTIVO" <?php if( $pesoC->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/controlPeso')); ?>">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/controlPeso')); ?>" >Guardar</button>
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




<?php echo $__env->make('weigthC.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/weigthC/edit-weigthC.blade.php ENDPATH**/ ?>