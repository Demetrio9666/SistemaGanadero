
<?php $__env->startSection('nombre_regitro'); ?>
Editar Reproducción Artificial
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionA.update', $re->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
    <div class="col-md-6">
        <label for="">Fecha de Registro:</label>
        <input type="date" class="form-control" id="fecha" name="date" value="<?php echo e($re->date); ?>">
    </div>
    <br>
    <div class="form-group">
        <h1>Animal</h1>
        <br>
            <div class="input-group mb-3">
                    <input type="hidden" id="idcodi" name="animalCode_id_m"  value="<?php echo e($re->animalCode_id_m); ?>">

                    <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalhembra" >Buscar</button>
                    
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                    <?php $__currentLoopData = $animalhembra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                value =" <?php echo e($i->animalCode); ?> "
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >

                        
                    <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" id="edad" name="age_month" disabled=disabled 
                    <?php $__currentLoopData = $animalhembra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                value =" <?php echo e($i->age_month); ?> "
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                
                    <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                    <?php $__currentLoopData = $animalhembra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                value =" <?php echo e($i->raza); ?> "
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                    
                    <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  
                    <?php $__currentLoopData = $animalhembra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                value =" <?php echo e($i->sex); ?> "
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                    
            </div>

    </div>
                    <h1>Material Genético</h1>
                    <br>
                    <input type="hidden" id="idcodi_ar" name="artificial_id"    value="<?php echo e($re->artificial_id); ?>">
                    <div class="col-md-3">
                            <label>Raza:</label>
                            <input type="text" class="form-control" disabled=disabled id="raza3" 
                            <?php $__currentLoopData = $arti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($re->artificial_id == $i->id ): ?>
                                        value =" <?php echo e($i->race_d); ?> "
                                    <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                    </div>
                    <br>   
                    <div class="col-md-3">
                            <label>Tipo de Material Genetico:</label>
                            <input type="text" class="form-control" disabled=disabled id="material3" 
                            <?php $__currentLoopData = $arti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($re->artificial_id == $i->id ): ?>
                                        value =" <?php echo e($i->reproduccion); ?> "
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                    </div>
                    <br>   
                    <div class="col-md-3">
                            <label>Nombre del Proveedor:</label>
                            <input type="text" class="form-control" disabled=disabled id="proveedor3" 
                            <?php $__currentLoopData = $arti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($re->artificial_id == $i->id ): ?>
                                        value =" <?php echo e($i->supplier); ?> "
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                    </div>
            <br>      
            <h1></h1>
            <br>
            <div class="card">
                <div class="card-body">
                  <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th> 
                            <th>Raza</th>
                            <th>Tipo de Material Genetico</th>
                            <th>Proveedor</th>
                            <th>Acción</th>   
                        </tr>
                    </thead>
                    <tbody>
                          <?php $__currentLoopData = $arti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                          <tr>
                              <<td class="col1"><?php echo e($i->id); ?></td>
                              <td class="col2"><?php echo e($i->race_d); ?></td>
                              <td class="col3"><?php echo e($i->reproduccion); ?></td>
                              <td class="col4"><?php echo e($i->supplier); ?></td>
                              
                                <td> 
                                    <center>
                                        <button type="button" class="btn btn-success btn   btselect3"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button>
                                    </center>
                                    
                                </td>
                              
                             
                              
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                    </tbody>
                </table>
                </div>
            </div>         

    </div>
    <div  class="form-group">
        <label for="">Estado de la Reproducción:</label>
        <select class="form-control" id="inputPassword4" name="reproduction_state" value="<?php echo e($re->reproduction_state); ?>">
            <option value="ESPERA"<?php if($re->reproduction_state == "ESPERA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ESPERA</option>
            <option value="EXITOSO"<?php if($re->reproduction_state == "EXITOSO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>EXITOSO</option>
            <option value="FALLIDO"<?php if($re->reproduction_state == "FALLIDO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>FALLIDO</option>
        </select>
    </div>
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($re->actual_state); ?>">
            <option value="ACTIVO" <?php if( $re->actual_state == "ACTIVO"): ?> selected <?php endif; ?>>ACTIVO</option>
            <option value="INACTIVO" <?php if( $re->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
         </select>
    </div>

    <center>
        <div class="col-md-8-self-center" style="margin: 40px" >
            <a type="submit" class="btn btn-secondary btn"  href="<?php echo e(url('fichaReproduccionA')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('fichaReproduccionA')); ?>" >Guardar</button>
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







<?php echo $__env->make('file_reproductionA.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/edit-reproductionA.blade.php ENDPATH**/ ?>