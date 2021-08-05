

<div class="form-group">
    <?php echo Form::label('name', 'Nombre del Rol:'); ?>

    <?php echo Form::text('name',null,['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del rol']); ?>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="tab1" data-toggle="tab" href="#t1" role="tab" aria-controls="Ficha de Animales" aria-selected="true">Ficha de Animales </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#t2" role="tab" aria-controls="Ficha de Parto" aria-selected="false">Ficha de Parto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab3" data-toggle="tab" href="#t3" role="tab" aria-controls="Ficha de Tratamiento" aria-selected="false">Ficha de Tratamiento</a>
            </li>
        <li class="nav-item">
        <a class="nav-link" id="tab4" data-toggle="tab" href="#t4" role="tab" aria-controls="Ficha de Reproducción" aria-selected="false">Ficha de Reproducción</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="tab5" data-toggle="tab" href="#t5" role="tab" aria-controls="Control Vacunas" aria-selected="false">Control Vacunas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab5" data-toggle="tab" href="#t6" role="tab" aria-controls="Control Peso" aria-selected="false">Control Peso</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab6" data-toggle="tab" href="#t7" role="tab" aria-controls="Control Desparacitación" aria-selected="false">Control Desparacitación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab7" data-toggle="tab" href="#t8" role="tab" aria-controls="Control Preñez" aria-selected="false">Control Preñez</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab8" data-toggle="tab" href="#t9" role="tab" aria-controls="Vacunas" aria-selected="false">Desparacitante</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab9" data-toggle="tab" href="#t10" role="tab" aria-controls="Vitaminas" aria-selected="false">Vacuna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab10" data-toggle="tab" href="#t11" role="tab" aria-controls="Antibióticos" aria-selected="false">Vitamina</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab10" data-toggle="tab" href="#t12" role="tab" aria-controls="Material Genético" aria-selected="false">Antibióticos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab10" data-toggle="tab" href="#t13" role="tab" aria-controls="Ubicación Interna" aria-selected="false">Material Genético</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab10" data-toggle="tab" href="#t14" role="tab" aria-controls="Razas" aria-selected="false">Ubicación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab10" data-toggle="tab" href="#t15" role="tab" aria-controls="Razas" aria-selected="false">Razas</a>
        </li>
    
    </ul>
    <div class="tab-content" id="animal">
        
        <div class="tab-pane fade show active" id="t1" role="tabpanel" aria-labelledby="tab2">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $A; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t2" role="tabpanel" aria-labelledby="tab3">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $P; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t3" role="tabpanel" aria-labelledby="contact-tab4">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $T; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t4" role="tabpanel" aria-labelledby="contact-tab5">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $R; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t5" role="tabpanel" aria-labelledby="contact-tab6">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CV; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t6" role="tabpanel" aria-labelledby="contact-tab7">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
    
        </div>
        <div class="tab-pane fade" id="t7" role="tabpanel" aria-labelledby="contact-tab8">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t8" role="tabpanel" aria-labelledby="contact-tab9">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CPRE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t9" role="tabpanel" aria-labelledby="contact-tab9">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CDES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t10" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFV; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div> 
        </div>
        <div class="tab-pane fade" id="t11" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFVI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
    
        <div class="tab-pane fade" id="t12" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFAN; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
    
        <div class="tab-pane fade" id="t13" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFMG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t14" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
    
        <div class="tab-pane fade" id="t15" role="tabpanel" aria-labelledby="contact-tab10">
            <div class="card">
                <div class="card-body">
                <table id="" class="table"  >
                    <thead>             
                        <tr>
                            <th >Acción</th>
                            <th >Nombre</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $__currentLoopData = $CONFRA; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->name); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
    </div>
    <center>
        <div class="form-group">
            <a type="submit" class="btn btn-secondary btn" href="<?php echo e(url('/rol')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/rol')); ?>" >Guardar</button>
        </div>
    </center>
   
</div>




<?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/base/plantilla.blade.php ENDPATH**/ ?>