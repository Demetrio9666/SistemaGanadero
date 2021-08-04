
<?php $__env->startSection('nombre_regitro'); ?>
         Registro de Partos 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
        <form action="<?php echo e(route('fichaParto.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                    <div class="col-md-6">
                        
                            <label for="">Fecha de Control:</label>
                            <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>" >
                        
                    </div>
                
                    <div class="col-md-6">
                                <div class="input-group mb-3" style="margin: 40px">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>" disabled=disabled >
                                        <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e(old('animalCode_id')); ?>"  >
                                </div>
                        
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Machos:</label>
                        <input type="number" class="form-control" id="fecha_r" name="male" value="<?php echo e(old('male')); ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Hembras:</label>
                        <input type="number" class="form-control" id="fecha_r" name="female" value="<?php echo e(old('female')); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="">Cant.Muertos:</label>
                        <input type="number" class="form-control" id="fecha_r" name="dead" value="<?php echo e(old('dead')); ?>" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Estado de la Madre:</label>
                        <select class="form-control" id="inputPassword4" name="mother_status" value="<?php echo e(old('mother_status')); ?>">
                            <option selected></option>
                            <option value="VIVA" <?php if(old('mother_status') == "VIVA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>VIVA</option>
                            <option value="MUERTA" <?php if(old('mother_status') == "MUERTA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MUERTA</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tipo de Parto:</label>
                        <select class="form-control" id="inputPassword4" name="partum_type" value="<?php echo e(old('partum_type')); ?>">
                            <option selected></option>
                            <option value="NATURAL" <?php if(old('partum_type') == "NATURAL"): ?> <?php echo e('selected'); ?> <?php endif; ?>>NATURAL</option>
                            <option value="CESÁREA" <?php if(old('partum_type') == "CESÁREA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>CESÁREA</option>
                    </select>
                    </div>
                    <div  class="col-md-6">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                            <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                            <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                        </select>
                    </div>
                    <center>
                        <div class="col-md-6" style="margin: 40px">
                                <a type="submit" class="btn btn-secondary "   href="<?php echo e(url('/fichaParto')); ?>">Cancelar</a>
                                <button type="submit" class="btn btn-success "  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaParto')); ?>" >Guardar</button>
                        </div>
                    </center>
            </div>
        </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('file_partum.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/create-partum.blade.php ENDPATH**/ ?>