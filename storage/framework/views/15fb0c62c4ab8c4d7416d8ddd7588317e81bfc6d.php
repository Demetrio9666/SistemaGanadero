
<?php $__env->startSection('nombre_regitro'); ?>
        Editar Registro de Partos Activos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
                <form action="<?php echo e(route('fichaParto.update',$par->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                                <div  class="col-md-6">
                                    <label for="">Fecha de Control:</label>
                                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($par->date); ?>">
                                </div>
                                <div class="col-md-6">
                                        <div class="input-group mb-3" style="margin: 40px">
                                                    <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                                    <span class="input-group-text" id="basic-addon1">Código</span>
                                                    <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                                    <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($par->animalCode_id == $i->id ): ?>
                                                                    value =" <?php echo e($i->animalCode); ?> "
                                                                <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> 
                                                    <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($par->animalCode_id); ?>">
                                        </div>
                                </div>   
                                
                                <div class="col-md-6">
                                    <label for="">Cant.Machos:</label>
                                    <input type="number" class="form-control" id="fecha_r" name="male" value="<?php echo e($par->male); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Cant.Hembras:</label>
                                    <input type="number" class="form-control" id="fecha_r" name="female" value="<?php echo e($par->female); ?>" >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Cant.Muertos:</label>
                                    <input type="number" class="form-control" id="fecha_r" name="dead" value="<?php echo e($par->dead); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Estado de la Madre:</label>
                                    <select class="form-control" id="inputPassword4" name="mother_status" value="<?php echo e($par->mother_status); ?>">
                                        <option selected></option>
                                        <option value="VIVA"  <?php if($par->mother_status == "VIVA" ): ?> selected <?php endif; ?> >VIVA</option>
                                        <option value="MUERTA" <?php if($par->mother_status == "MUERTA" ): ?> selected <?php endif; ?>  >MUERTA</option>
                                </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Parto:</label>
                                    <select class="form-control" id="inputPassword4" name="partum_type" value="<?php echo e($par->partum_type); ?>">
                                        <option selected></option>
                                        <option value="NATURAL"  <?php if($par->partum_type == "NATURAL" ): ?> selected <?php endif; ?>  >NATURAL</option>
                                        <option value="CESÁREA"  <?php if($par->partum_type == "CESÁREA" ): ?> selected <?php endif; ?> >CESÁREA</option>
                                     </select>
                                </div>
                                <div  class="col-md-6">
                                    <label for="">Estado Actual:</label>
                                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($par->actual_state); ?>">
                                        <option value="DISPONIBLE" <?php if( $par->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                                        <option value="INACTIVO" <?php if( $par->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
                                    </select>
                                </div> 
                                <center>
                                        <div class="col-md-6" style="margin: 40px">
                                                <a type="submit" class="btn btn-secondary "   href="<?php echo e(url('/fichaParto')); ?>">Cancelar</a>
                                                <button type="submit" class="btn btn-success "  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaParto')); ?>" >Guardar</button>
                                        </div>
                                </center>
                                <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </form>
                            
                    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('file_partum.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/edit-partum.blade.php ENDPATH**/ ?>