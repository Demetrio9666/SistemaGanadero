
<?php $__env->startSection('nombre_regitro'); ?>
Registro Reproducción Artificial
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionA.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
            <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha" name="date" >
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
            <br>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3 " >
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalhembra" >Buscar</button>
                        
                            <input type="text" class="<?php echo e($errors->has('animalCode_id_m') ? 'is-invalid':''); ?>" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="<?php echo e(old('codigo_animal')); ?>">
                           

                            <input type="text" placeholder="Edad"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="edad" name="age_month" disabled=disabled  value="<?php echo e(old('edad')); ?>">
                        
                        
                            
                                <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  value="<?php echo e(old('sexo')); ?>">
                                <?php $__errorArgs = ['animalCode_id_m'];
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
  


        
                        <h5>Material Genético</h5>
                        <br>
                        <div class="input-group mb-3" >
                                <input type="hidden" id="idcodi_ar" name="artificial_id" class="<?php echo e($errors->has('artificial_id') ? 'is-invalid':''); ?>" >
                                <div class="col-md-3">
                                        <label>Raza:</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('artificial_id') ? 'is-invalid':''); ?>  " name="raza3" disabled=disabled id="raza3" value="<?php echo e(old('raza3')); ?>">
                                    
                                </div>
                                <br>   
                                <div class="col-md-3">
                                        <label>Tipo de Material Genetico:</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('artificial_id') ? 'is-invalid':''); ?>" disabled=disabled id="material3" value="<?php echo e(old('material3')); ?>">
                                </div>
                                <br>   
                                <div class="col-md-3">
                                        <label>Nombre del Proveedor:</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('artificial_id') ? 'is-invalid':''); ?>" disabled=disabled id="proveedor3" value="<?php echo e(old('proveedor3')); ?>">
                                </div>
                                <?php $__errorArgs = ['artificial_id'];
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
                    <br>      
                    <h1></h1>
                    <br>
                
                    <div class="card"  >
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
                                    <td class="col1"><?php echo e($i->id); ?></td>
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
                
            <div  class="form-group">
                <label for="">Estado de la Reproducción:</label>
                <select class="form-control" id="inputPassword4" name="reproduction_state" value="<?php echo e(old('reproduction_state')); ?>">
                    <option value="ESPERA"<?php if(old('reproduction_state') == "ESPERA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ESPERA</option>
                    <option value="EXITOSO"<?php if(old('reproduction_state') == "EXITOSO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>EXITOSO</option>
                    <option value="FALLIDO"<?php if(old('reproduction_state') == "FALLIDO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>FALLIDO</option>
                </select>
            </div>
            
            <div  class="form-group">
                <label for="">Estado actual de la Información:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                    <option value="ACTIVO"<?php if(old('actual_state') == "ACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ACTIVO</option>
                    <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                </select>
            </div>
            <center>
                <div class="col-md-8-self-center" style="margin: 40px" >
                    <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/fichaReproduccionA')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaReproduccionA')); ?>" >Guardar</button>
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
<?php echo $__env->make('file_reproductionA.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/create-reproductionA.blade.php ENDPATH**/ ?>