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
            <h1>Registro control de Parto</h1>
            <form action="<?php echo e(route('fichaParto.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Fecha de Control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e(old('date')); ?>" >
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>" disabled=disabled >
                                <input type="hidden" id="idcodi" name="animalCode_id"  value="<?php echo e(old('animalCode_id')); ?>">
                        </div>
                </div>
                
                       
                    
                <div class="form-group">
                    <label for="">Cant.Machos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="male" value="<?php echo e(old('male')); ?>">
                </div>

                <div class="form-group">
                    <label for="">Cant.Hembras:</label>
                    <input type="number" class="form-control" id="fecha_r" name="female" value="<?php echo e(old('female')); ?>">
                </div>
                <div class="form-group">
                    <label for="">Cant.Muertos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="dead" value="<?php echo e(old('dead')); ?>" >
                </div>
                <div class="form-group">
                    <label for="">Estado de la Madre:</label>
                    <select class="form-control" id="inputPassword4" name="mother_status" value="<?php echo e(old('mother_status')); ?>">
                        <option selected></option>
                        <option value="VIVA" <?php if(old('mother_status') == "VIVA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>VIVA</option>
                        <option value="MUERTA" <?php if(old('mother_status') == "MUERTA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>MUERTA</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Tipo de Parto:</label>
                    <select class="form-control" id="inputPassword4" name="partum_type" value="<?php echo e(old('partum_type')); ?>">
                        <option selected></option>
                        <option value="NATURAL" <?php if(old('partum_type') == "NATURAL"): ?> <?php echo e('selected'); ?> <?php endif; ?>>NATURAL</option>
                        <option value="CESÁREA" <?php if(old('partum_type') == "CESÁREA"): ?> <?php echo e('selected'); ?> <?php endif; ?>>CESÁREA</option>
                  </select>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                        <option value="DISPONIBLE"<?php if(old('actual_state') == "DISPONIBLE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>DISPONIBLE</option>
                        <option value="INACTIVO"<?php if(old('actual_state') == "INACTIVO"): ?> <?php echo e('selected'); ?> <?php endif; ?>>INACTIVO</option>
                     </select>
                </div>

                <div class="col-md-6-self-center" style="margin: 50px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="<?php echo e(url('/fichaParto')); ?>">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaParto')); ?>" >Guardar</button>
  
                </div>



            </form>
        </div>
    </div>
    <?php echo $__env->make("modal.modalAnimalesP", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/create-partum.blade.php ENDPATH**/ ?>