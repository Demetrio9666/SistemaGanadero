<head>
    <link href="<?php echo e(asset('css/app.css')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    
    <?php $__env->startSection('title'); ?>
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="/css/configuracion.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
        <div class="container" id="registration-form">
            <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="image"></div>
            <div class="frm">
                <h1>Editar Raza</h1>
                <form action=" <?php echo e(route('confRaza.update',$raza->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="">Nombre de la Raza:</label>
                        <input type="text" class="form-control" id="raza" name="race_d" value="<?php echo e($raza->race_d); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="">Porcentaje:</label>
                        <input type="int" class="form-control" id="porcentaje" name="percentage" value="<?php echo e($raza->percentage); ?>">
                    </div>      
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($raza->actual_state); ?>">
                            <option>Disponible</option>
                            <option>Inactivo</option>
                         </select>
                    </div>     
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('/confRaza')); ?>" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('/confRaza')); ?>" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>
  </body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/race/edit-race.blade.php ENDPATH**/ ?>