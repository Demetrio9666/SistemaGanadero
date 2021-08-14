
<?php $__env->startSection('nombre_regitro'); ?>
Registro de Reproducción Natural
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionM.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
            <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha_r" name="date" >
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
                    <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                            
                            <input type="text" class="<?php echo e($errors->has('animalCode_id_m') ? 'is-invalid':''); ?>"placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="<?php echo e(old('codigo_animal')); ?>">

                            <input type="text" placeholder="Raza"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza"  disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Edad"  id="edad"aria-label="Example text with button addon" aria-describedby="button-addon1" name="age_month" disabled=disabled  value="<?php echo e(old('edad')); ?>">
                        
                        
                            
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

            
                <h5>Animal Macho</h5>
                <br>
                    
                            <input type="hidden" id="idcodi2" class="<?php echo e($errors->has('animalCode_id_p') ? 'is-invalid':''); ?>" name="animalCode_id_p" value="<?php echo e(old('idcodi2')); ?>">
                            <div class="col-md-3">
                                <label>Codigo Animal:</label>
                                <input type="text" class="form-control" id="codigo_animal2"  disabled=disabled value="<?php echo e(old('codigo_animal2')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Raza:</label>
                                <input type="text" class="form-control" id="raza2"  disabled=disabled value="<?php echo e(old('raza2')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Edad:</label>
                                <input type="text" class="form-control" id="edad2" name="age_month" disabled=disabled value="<?php echo e(old('edad2')); ?>">
                            </div>
                            <div class="col-md-3">
                                <label >Sexo:</label>
                                <input type="text" class="form-control" id="sexo2" name="sex" disabled=disabled value="<?php echo e(old('sexo2')); ?>">
                            </div>
                            <?php $__errorArgs = ['animalCode_id_p'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <div class="invalid-feedback"><?php echo e($message); ?></div>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <br>      
                            <h1></h1>
                            <br>
                    <div class="card">
                        <div class="card-body">
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th> 
                                    <th>Codigo Animal</th>
                                    <th>Raza</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Acción</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                                <tr>
                                    <td><?php echo e($i->id); ?></td>
                                    <td><?php echo e($i->animalCode); ?></td>
                                    <td><?php echo e($i->race_d); ?></td>
                                    <td><?php echo e($i->age_month); ?></td>
                                    <td><?php echo e($i->sex); ?></td>
                                    <td> <button type="button" class="btn btn-success btn   btselect2"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>
                                    
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                            </tbody>
                        </table>
                        </div>
                    </div>
            

            <div  class="form-group">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                    <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                    <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                </select>
            </div>
            
            <center>
                <div class="col-md-8-self-center" style="margin: 40px" >
                    <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/fichaReproduccionM')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaReproduccionM')); ?>" >Guardar</button>
                </div>
            </center>
    </div>
    <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('file_reproductionM.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionM/create-reproduction.blade.php ENDPATH**/ ?>