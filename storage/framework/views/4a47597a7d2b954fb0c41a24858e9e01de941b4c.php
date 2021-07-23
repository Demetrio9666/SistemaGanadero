
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    <?php $__env->stopSection(); ?>
    <title>Registration Form</title>
</head>
<body>
    <?php $__env->startSection('content_header'); ?>
        <div class="container" id="registration-form">
            <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="image"></div>
            <div class="frm">
                <h1>Registar Ficha de Reproduccion Externo</h1>
                <form action="<?php echo e(route('fichaReproduccionEx.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="" name="date" >
                    </div>
                    <div class="form-group">
                        <label for="" class="">Código Animal</label>
                            <div class="input-group mb-3">
                                    <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
    
                                    <span class="input-group-text" id="basic-addon1">Raza</span>
                                    <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >
    
                                    <input type="hidden" id="idcodi" name="animalCode_id">
                        
                            <div  class="col-md-6">
                                <label for="" class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled value="<?php echo e(old('edad')); ?>">
                            </div>
                            <div  class="col-md-6">
                                <label for="" class="form-label">Sexo:</label>
                                <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled value="<?php echo e(old('sex')); ?>">
                            </div>
    
                            </div>
    
                    </div>
                    <div class="col-md-6">
                        <label for="">Codigo Animal Externo:</label>
                        <input type="text" class="form-control" id="desp" name="animalCode_Exte" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id" value="<?php echo e(old('race_id')); ?>">
                                <option></option>
                            <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($i->id); ?>" <?php if(old('race_id') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($i->race_d); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div> 
                    <div class="form-group">
                        <label for="">Edad-meses:</label>
                        <input type="int" class="form-control" name="age_month" value="<?php echo e(old('age_month')); ?>">
                    </div>  
                    
                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select class="form-control" id="razas"  name="sex" value="<?php echo e(old('sex')); ?>">
                            <option></option>
                            <option value="HEMBRA" <?php if(old('sex') == "HEMBRA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>HEMBRA</option>
                            <option value="MACHO" <?php if(old('sex') == "MACHO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MACHO</option>
                        </select>
                        
                    </div>       

                    <div class="form-group">
                        <label for="">Nombre de la Hacienda:</label>
                        <input type="text" class="form-control"  name="hacienda_name" value="<?php echo e(old('hacienda_name')); ?>">
                    </div>

                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                            <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                            <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                         </select>
                    </div>

                    <div class="form-group" style="margin: 50px">
                        <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('inactivos/fichaReproduccionEx')); ?>">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('inactivos/fichaReproduccionEx')); ?>" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php echo $__env->make("modal.modalAnimalesEX", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
   
    <?php $__env->startSection('js'); ?>
    <script>
        $('#modalanimal').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
      });
      $(".btselect").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();
                var col5=currentRow.find("td:eq(4)").text();
                
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
                $("#raza").val(col3);
                $("#edad").val(col4);
                $("#sexo").val(col5);
           });
    </script>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/create-external_M.blade.php ENDPATH**/ ?>