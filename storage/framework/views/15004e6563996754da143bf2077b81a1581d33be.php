
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php $__env->startSection('css'); ?>


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
            <h1>Ficha de Reproducción</h1>
            <form action="<?php echo e(route('fichaReproduccionA.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" >
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="<?php echo e(old('codigo_animal')); ?>">

                                <span class="input-group-text" id="basic-addon1">Raza</span>
                                <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >

                                <input type="hidden" id="idcodi" name="animalCode_id_m">
                    
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Edad:</label>
                                    <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled  value="<?php echo e(old('edad')); ?>">
                                </div>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Sexo:</label>
                                    <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled  value="<?php echo e(old('sexo')); ?>">
                                </div>
                        </div>

                </div>

                <div class="form-group" id="reproduccion_ar">
                    <h1>Reproducción Artificial</h1>
                    <br>
                        <div class="input-group mb-3 ">  
                                <input type="hidden" id="idcodi_ar" name="artificial_id">
                                <div class="col-md-6">
                                        <label>Raza:</label>
                                        <input type="text" class="form-control" disabled=disabled id="raza3" value="<?php echo e(old('raza3')); ?>">
                                </div>

                                <div class="col-md-6">
                                        <label>Tipo de Material Genetico:</label>
                                        <input type="text" class="form-control" disabled=disabled id="material3" value="<?php echo e(old('material3')); ?>">
                                </div>

                                <div class="col-md-6">
                                        <label>Nombre del Proveedor:</label>
                                        <input type="text" class="form-control" disabled=disabled id="proveedor3" value="<?php echo e(old('proveedor3')); ?>">
                                </div>
                        </div>
                        
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
                                          <td><?php echo e($i->id); ?></td>
                                          <td><?php echo e($i->race_d); ?></td>
                                          <td><?php echo e($i->reproduccion); ?></td>
                                          <td><?php echo e($i->supplier); ?></td>
                                          <td> <button type="button" class="btn btn-success btn-lg   btselect3"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>   
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                                </tbody>
                            </table>
                            </div>
                        </div>
                </div> 
                
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                        <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                        <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                     </select>
                </div>
                <div class="col-md-8-self-center" style="margin: 80px" >
                    <a type="submit" class="btn btn-secondary btn-lg"   href="<?php echo e(url('/fichaReproduccionA')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaReproduccionA')); ?>" >Guardar</button>
                </div>

            </form>

            
        </div>
    </div>
    <?php echo $__env->make("modal.modalAnimalesR", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
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

           $(".btselect3").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();

                
                $("#idcodi_ar").val(col1);
                $("#raza3").val(col2);
                $("#material3").val(col3);
                $("#proveedor3").val(col4);
                
           });

   </script>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionA/create-reproductionA.blade.php ENDPATH**/ ?>