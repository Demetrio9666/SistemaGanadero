
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>

    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="/css/registro.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
    <div class="container" id="registration-form">
        <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="image"></div>
        <div class="frm">
            <h1>Editar Control de preñez </h1>
            <form action="<?php echo e(route('controlPrenes.update',$pre->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Fecha de Vacunacion:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($pre->date); ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Código</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pre->animalCode_id == $i->id ): ?>
                                                 value =" <?php echo e($i->animalCode); ?> "
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                               
                               
                                <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($pre->animalCode_id); ?>">
                                
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="vitamin_id"   value="<?php echo e($pre->vitamin_id); ?>">
                        <option selected></option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($i->id); ?>" <?php if($pre->vitamin_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->vitamin_d); ?></option>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>  
 
                <div class="form-group">
                    <label for="">Alternativa 1 de Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="alternative1"   value="<?php echo e($pre->alternative1); ?>">
                        <option selected>N/A</option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option <?php echo e($i->id); ?>  <?php if($pre->alternative1 == $i->vitamin ): ?> value= "<?php echo e($i->vitamin); ?>"  selected  <?php endif; ?>><?php echo e($i->vitamin); ?></option>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 2 de Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="alternative2"   value="<?php echo e($pre->alternative2); ?>">
                        <option selected>N/A</option>
                        <?php $__currentLoopData = $vitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <option <?php echo e($i->id); ?>  <?php if($pre->alternative2 == $i->vitamin ): ?> value= "<?php echo e($i->vitamin); ?>" selected  <?php endif; ?>><?php echo e($i->vitamin); ?></option>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Observación:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observation"><?php echo e($pre->observation); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Fecha de próximo control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($pre->date_r); ?>">
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($pre->actual_state); ?>">
                        <option>Disponible</option>
                        <option>Inactivo</option>
                     </select>
                </div> 
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('/controlPrenes')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('/controlPrenes')); ?>" >Guardar</button>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/pregnancyC/edit-pregnancyC.blade.php ENDPATH**/ ?>