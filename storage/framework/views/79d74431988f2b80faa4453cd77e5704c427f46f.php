
<?php $__env->startSection('nombre_regitro'); ?>
Asignación de Roles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('formulario'); ?>
        <center>
            <i class="fas fa-user-tie" style="font-size: 3em"></i><h5> <?php echo e($usuario->name); ?></h5>
        </center>
        
        <?php echo Form::model($usuario, ['route' => ['usuarios.update',$usuario],'method'=>'put']); ?>

        
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <label >
                       
                       
                        <?php echo Form::checkbox('roles[]', $role->id, null, ['class'=> 'only-one'],['id'=>'checkResumen']); ?>

                        <?php echo e($role->rol); ?>

                    </label>
                </div>
               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            <center>
                <a type="button"  class="btn btn-secondary mt-2"   href="<?php echo e(url('/usuarios')); ?>">Cancelar</a>
                <?php echo Form::submit('Asignación', ['class'=>'btn btn-success mt-2 ']); ?>

            </center>
            <?php echo $__env->make('layouts.base-usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::close(); ?>


        <script>
            let Checked = null;
        //The class name can vary
        for (let CheckBox of document.getElementsByClassName('only-one')){
            CheckBox.onclick = function(){
              if(Checked!=null){
              Checked.checked = false;
              Checked = CheckBox;
            }
            Checked = CheckBox;
          }
        }
        </script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('admin.usuarios.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/usuarios/edit.blade.php ENDPATH**/ ?>