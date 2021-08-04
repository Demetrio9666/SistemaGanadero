
<?php $__env->startSection('nombre_regitro'); ?>
Registro Reproducción Artificial
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
<form action="<?php echo e(route('fichaReproduccionA.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
            <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control" id="fecha_r" name="date" >
            </div>
            <br>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        
                            <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="<?php echo e(old('codigo_animal')); ?>">

                            <input type="text" placeholder="Raza"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" name="age_month" disabled=disabled  value="<?php echo e(old('edad')); ?>">
                        
                        
                            
                                <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  value="<?php echo e(old('sexo')); ?>">
                        
                    </div>

            </div>

        
                        <h5>Material Genético</h5>
                        <br>
                        <input type="hidden" id="idcodi_ar" name="artificial_id">
                        <div class="col-md-3">
                                <label>Raza:</label>
                                <input type="text" class="form-control" disabled=disabled id="raza3" value="<?php echo e(old('raza3')); ?>">
                        </div>
                        <br>   
                        <div class="col-md-3">
                                <label>Tipo de Material Genetico:</label>
                                <input type="text" class="form-control" disabled=disabled id="material3" value="<?php echo e(old('material3')); ?>">
                        </div>
                        <br>   
                        <div class="col-md-3">
                                <label>Nombre del Proveedor:</label>
                                <input type="text" class="form-control" disabled=disabled id="proveedor3" value="<?php echo e(old('proveedor3')); ?>">
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
                                    <td><?php echo e($i->id); ?></td>
                                    <td><?php echo e($i->race_d); ?></td>
                                    <td><?php echo e($i->reproduccion); ?></td>
                                    <td><?php echo e($i->supplier); ?></td>
                                    <td> <button type="button" class="btn btn-success btn   btselect3"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>   
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
                    <a type="submit" class="btn btn-secondary btn"   href="<?php echo e(url('/fichaReproduccionA')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaReproduccionA')); ?>" >Guardar</button>
                </div>
            </center>
    </div>
    
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('file_reproductionA.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/create-reproductionA.blade.php ENDPATH**/ ?>