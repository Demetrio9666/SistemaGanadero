
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
                        <h5>Listado de Roles</h5>
                        <?php echo Form::model($usuario, ['route' => ['usuarios.update',$usuario],'method'=>'put']); ?>

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <label>
                                        <?php echo Form::checkbox('roles[]', $role->id, null, ['class'=> 'mr-1']); ?>

                                        <?php echo e($role->name); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo Form::submit('Asignación', ['class'=>'btn btn-primary mt-2']); ?>

                        <?php echo Form::close(); ?>


                        
                    </div>

                </div>

            </div>
            
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/edit.blade.php ENDPATH**/ ?>