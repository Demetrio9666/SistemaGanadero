<head>
    <link href="<?php echo e(asset('css/app.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
    <div class="container" id="registration-form">
        <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="image"></div>
        <div class="frm">
            <h1>Editar Control de desparasitación </h1>
            <form action="<?php echo e(route('controlDesparasitacion.update',$desC->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Fecha de Desparasitación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($desC->date); ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Codigo Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($desC->animalCode_id == $i->id ): ?>
                                                 value =" <?php echo e($i->animalCode); ?> "
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                               
                               
                                <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($desC->animalCode_id); ?>">
                                
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Desparasitante:</label>
                    <select class="form-control" id="inputPassword4"  name="deworming_id"   value="<?php echo e($desC->deworming_id); ?>">
                        <option selected></option>
                        <?php $__currentLoopData = $des; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($i->id); ?>" <?php if($desC->deworming_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->dewormer_d); ?></option>       
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>  

                <div class="form-group">
                    <label for="">Fecha de re-desparasitación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($desC->date_r); ?>">
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($desC->actual_state); ?>">
                        <option>Disponible</option>
                        <option>Inactivo</option>
                     </select>
                </div> 
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('/controlDesparasitacion')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('/controlDesparasitacion')); ?>" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make("modal.modalAnimales", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
           });

          
          
        

   </script>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/dewormerC/edit-dewormerC.blade.php ENDPATH**/ ?>