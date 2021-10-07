
<?php $__env->startSection('nombre_regitro'); ?>
         Registro de Partos 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
        <form action="<?php echo e(route('fichaParto.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                    <div class="col-md-6">
                        
                            <label for="">Fecha de Control:</label>
                            <input type="date" class="form-control <?php echo e($errors->has('date') ? 'is-invalid':''); ?>" id="fecha" name="date" value="<?php echo e(old('date')); ?>" >
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
                                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                        <input  type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>" disabled=disabled >
                                        <input class= "<?php echo e($errors->has('animalCode_id') ? 'is-invalid':''); ?>" type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e(old('animalCode_id')); ?>"  >
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
                        <label for="">Cant.Machos:</label>
                        <input type="number" class="form-control <?php echo e($errors->has('male') ? 'is-invalid':''); ?>" id="cantidadMacho" onChange="cantidadM(this.value)" name="male" value="<?php echo e(old('male')); ?>">
                        <?php $__errorArgs = ['male'];
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
                        <label for="">Cant.Hembras:</label>
                        <input type="number" class="form-control <?php echo e($errors->has('female') ? 'is-invalid':''); ?>" id="cantidadHembra" onChange="cantidadH(this.value)" name="female" value="<?php echo e(old('female')); ?>">
                        <?php $__errorArgs = ['female'];
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
                        <label for="">Cant.Muertos:</label>
                        <input type="number" class="form-control <?php echo e($errors->has('dead') ? 'is-invalid':''); ?>" id="cantidadMuertos" onChange="cantidadMU(this.value)" name="dead" value="<?php echo e(old('dead')); ?>" >
                        <?php $__errorArgs = ['dead'];
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
                        <label for="">Estado de la Madre:</label>
                        <select class="form-control <?php echo e($errors->has('mother_status') ? 'is-invalid':''); ?>"  name="mother_status" value="<?php echo e(old('mother_status')); ?>">
                            <option selected></option>
                            <option value="VIVA" <?php if(old('mother_status') == "VIVA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>VIVA</option>
                            <option value="MUERTA" <?php if(old('mother_status') == "MUERTA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MUERTA</option>
                    </select>
                    <?php $__errorArgs = ['mother_status'];
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
                        <label for="">Tipo de Parto:</label>
                        <select class="form-control <?php echo e($errors->has('partum_type') ? 'is-invalid':''); ?>"  name="partum_type" value="<?php echo e(old('partum_type')); ?>">
                            <option selected></option>
                            <option value="NATURAL" <?php if(old('partum_type') == "NATURAL"): ?> <?php echo e('selected'); ?> <?php endif; ?>>NATURAL</option>
                            <option value="CESÁREA" <?php if(old('partum_type') == "CESÁREA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>CESÁREA</option>
                    </select>
                    <?php $__errorArgs = ['partum_type'];
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
                    <div  class="col-md-6">
                        <label for="">Estado actual de la Información:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                            <option value="ACTIVO"<?php if(old('actual_state') == "ACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>ACTIVO</option>
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
<?php echo $__env->make('file_partum.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/create-partum.blade.php ENDPATH**/ ?>