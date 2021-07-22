
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    <?php $__env->startSection('title'); ?>
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
        <div class="container" id="registration-form">
            <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="image"></div>
            <div class="frm">
                <h1>Editar Fichas de Reproduccion Externo Inactivos</h1>
                <form action=" <?php echo e(route('inactivos.fichaReproduccionEx.update',$ext->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="desp" name="date" value="<?php echo e($ext->date); ?>" disabled=disabled >
                    </div>

                    <div class="form-group">
                        <label for="" class="">Código Animal</label>
                            <div class="input-group mb-3">
                                    <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                    <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($ext->animalCode_id == $i->id ): ?>
                                            value =" <?php echo e($i->animalCode); ?> "
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
    
                                    <span class="input-group-text" id="basic-addon1">Raza</span>
                                    <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled
                                    <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($ext->animalCode_id == $i->id ): ?>
                                            value =" <?php echo e($i->race_d); ?> "
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
    
                                    <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e($ext->animalCode_id); ?>">
                        
                                    <div  class="col-md-6">
                                        <label for="" class="form-label">Edad:</label>
                                        <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled
                                        <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ext->animalCode_id == $i->id ): ?>
                                                value =" <?php echo e($i->age_month); ?> "
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  >
                                    </div>
                                    <div  class="col-md-6">
                                        <label for="" class="form-label">Sexo:</label>
                                        <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled
                                        <?php $__currentLoopData = $animaleEX; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ext->animalCode_id == $i->id ): ?>
                                                value =" <?php echo e($i->sex); ?> "
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                                    </div>
    
                            </div>
    
                    </div>
                    <div class="form-group">
                        <label for="">Codigo Animal Externo:</label>
                        <input type="text" class="form-control" id="raza" name="animalCode_Exte" value="<?php echo e($ext->animalCode_Exte); ?>" disabled=disabled  >
                    </div>


                    <div  class="form-group">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id"  value="<?php echo e($ext->race_id); ?>" disabled=disabled >
                                <option selected>Seleccione la Raza</option>
                            <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($i->id); ?>" <?php if($ext->race_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->race_d); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>  
                


                    <div class="form-group">
                        <label for="">Edad-meses:</label>
                        <input type="int" class="form-control" name="age_month" value="<?php echo e($ext->age_month); ?>" disabled=disabled >
                    </div>  


                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select class="form-control" id="razas"  name="sex" value="<?php echo e($ext->sex); ?>" disabled=disabled >
                            <option>Seleccione</option>
                            <option value="Hembra" <?php if($ext->sex == "Hembra"): ?> selected <?php endif; ?>>Hembra</option>
                            <option value="Macho" <?php if($ext->sex == "Macho"): ?> selected <?php endif; ?>>Macho</option>
                        </select>
                    </div>   


                    <div class="form-group">
                        <label for="">Nombre Hacienda:</label>
                        <input type="text" class="form-control"  name="hacienda_name" value="<?php echo e($ext->hacienda_name); ?>" disabled=disabled >
                    </div> 
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state"  value="<?php echo e($ext->actual_state); ?>">
                            <option value="Disponible" <?php if( $ext->actual_state == "Disponible"): ?> selected <?php endif; ?>>Disponible</option>
                            <option value="Inactivo" <?php if( $ext->actual_state == "Inactivo"): ?> selected <?php endif; ?>>Inactivo</option>
                         </select>
                    </div> 
                    
                    
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('/inactivos/fichaReproduccionEx')); ?>" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('/inactivos/fichaReproduccionEx')); ?>" >Actualizar</button>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/edit-inactivo.blade.php ENDPATH**/ ?>