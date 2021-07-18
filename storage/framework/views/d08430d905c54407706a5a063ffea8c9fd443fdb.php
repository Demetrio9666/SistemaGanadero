<head>
    <link href="<?php echo e(asset('css/app.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
        <div class="container" id="registration-form">
            <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="image"></div>
            <div class="frm">
                <h1>Editar</h1>
                <form action="<?php echo e(route('confMate.update',$arti->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($arti->date); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id"  value="<?php echo e($arti->race_id); ?>"  >
                                <option></option>
                            <?php $__currentLoopData = $razas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($i->id); ?>" <?php if($arti->race_id == $i->id): ?> selected <?php endif; ?> > <?php echo e($i->race_d); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Material Genetico:</label>

                        <select class="form-control" id="inputPassword4"  name="reproduccion"   value="<?php echo e($arti->reproduccion); ?>">
                        
                           <option selected>...</option>
                           <option value ="Pajuela" <?php if( $arti->reproduccion == "Pajuela"): ?> selected <?php endif; ?>>Pajuela</option>
                           <option value ="Hembrional" <?php if($arti->reproduccion == "Hembrional"): ?>selected <?php endif; ?> >Hembrional</option>
                            
                      </select>
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="proveedor" name="supplier"   value="<?php echo e($arti->supplier); ?>">
                    </div>      
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($arti->actual_state); ?>">
                            <option>Disponible</option>
                            <option>Inactivo</option>
                         </select>
                    </div> 
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('/confMate')); ?>">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('/confMate')); ?>" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/artificialR/edit-artificialR.blade.php ENDPATH**/ ?>