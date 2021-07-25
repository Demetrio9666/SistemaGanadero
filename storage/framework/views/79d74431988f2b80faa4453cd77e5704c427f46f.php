
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    
    <?php $__env->startSection('css'); ?>
    
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
        <div class="container" id="registration-form">
            <div class="card">
                <div class="card-body">
                    <div class="frm">
                        <h1> Nombre del Usuario:</h1>
                        <center>
                            <h2> <?php echo e($usuario->name); ?></h2>
                        </center>
                        
                        

                        
                    </div>

                </div>

            </div>
            
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/edit.blade.php ENDPATH**/ ?>