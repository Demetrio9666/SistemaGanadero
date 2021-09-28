
<div class="form-group">
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
            <a class="nav-link" id="tab11" data-toggle="tab" href="#t12" role="tab" aria-controls="Material Genético" aria-selected="false">Antibióticos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab12" data-toggle="tab" href="#t13" role="tab" aria-controls="Ubicación Interna" aria-selected="false">Material Genético</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab13" data-toggle="tab" href="#t14" role="tab" aria-controls="Razas" aria-selected="false">Ubicación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab14" data-toggle="tab" href="#t15" role="tab" aria-controls="dashboard" aria-selected="false">Razas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab15" data-toggle="tab" href="#t16" role="tab" aria-controls="rol" aria-selected="false">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab16" data-toggle="tab" href="#t17" role="tab" aria-controls="rolUsuario" aria-selected="false">Rol</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab17" data-toggle="tab" href="#t18" role="tab" aria-controls="usuario" aria-selected="false">Asignación Permisos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab17" data-toggle="tab" href="#t19" role="tab" aria-controls="usuario" aria-selected="false">Usuario</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab18" data-toggle="tab" href="#t20" role="tab" aria-controls="actividad" aria-selected="false">Actividad de Usuario</a>
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
                        <?php $__currentLoopData = $fichaAnimales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $fichaParto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $fichaTratamiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $reproduccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $controlVacuna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $controlPeso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $controlDesp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $controlPrenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confDesp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confVacuna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confVitamina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confAntibiotico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confMaterial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confUbicacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
                        <?php $__currentLoopData = $confRaza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t16" role="tabpanel" aria-labelledby="contact-tab10">
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
                        <?php $__currentLoopData = $dashboard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t17" role="tabpanel" aria-labelledby="contact-tab10">
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
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t18" role="tabpanel" aria-labelledby="contact-tab10">
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
                        <?php $__currentLoopData = $rolUsuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t19" role="tabpanel" aria-labelledby="contact-tab10">
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
                        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                
                </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="t20" role="tabpanel" aria-labelledby="contact-tab10">
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
                        <?php $__currentLoopData = $actividad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                        <tr >
                            <td> <?php echo Form::checkbox('permissions[]', $i->id, null, ['class'=>'mr-1 ']); ?></td>
                            <td ><?php echo e($i->description); ?></td>
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
            <a type="button"  class="btn btn-secondary "   href="<?php echo e(url('/rol')); ?>">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="<?php echo e(Redirect::to('/rol')); ?>" >Guardar</button>
        </div>
    </center>
   
</div>

<script>
     function upperCase() {
                var x=document.getElementById("rol").value
                document.getElementById("rol").value=x.toUpperCase()
                             
            }
</script>


<?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/admin/base/plantilla.blade.php ENDPATH**/ ?>