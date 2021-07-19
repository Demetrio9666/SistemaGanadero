
<head>
   
    
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
            <h1>Registro de Animales</h1>
            <form action="<?php echo e(route('fichaAnimal.update', $animal->id)); ?>" method="POST" class="row g-3">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div  class="col-md-6">
                    <label for="" class="form-label">Código Animal:</label>
                    <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="<?php echo e($animal->animalCode); ?>">
                </div>
                <div  class="col-md-6">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_n" name="fecha_nacimiento"  value="<?php echo e($animal->date); ?>">
                </div>
                <div  class="col-md-6">
                    <label for="">Raza:</label>
                    <select class="form-control" id="razas" name="raza"  value="<?php echo e($animal->race_id); ?>">
                            <option selected></option>
                        <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($i->id); ?>" <?php if($animal->race_id == $i->id ): ?> selected <?php endif; ?>><?php echo e($i->race_d); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div> 
                <div  class="col-md-6">
                    <label for="">Sexo:</label>
                    <select class="form-control" id="inputPassword4" name="sexo" value="<?php echo e($animal->sex); ?>">
                        <option selected></option>
                        <option value="Macho"   <?php if($animal->sex == "Macho" ): ?> selected <?php endif; ?>>Macho</option>
                        <option value="Hembra"   <?php if($animal->sex == "Hembra" ): ?> selected <?php endif; ?>>Hembra</option>
                  </select>
                </div> 
                <div  class="col-md-6">
                    <label for="">Etapa:</label>
                    <select class="form-control" id="inputPassword4" name="etapa"  value="<?php echo e($animal->stage); ?>">
                        <option selected></option>
                        <option value="Vaca"   <?php if($animal->stage == "Vaca" ): ?> selected <?php endif; ?>>Vaca</option>
                        <option value="Toro"   <?php if($animal->stage == "Toro" ): ?> selected <?php endif; ?>>Toro</option>
                        <option value="Ternero"   <?php if($animal->stage == "Ternero" ): ?> selected <?php endif; ?>>Ternero</option>
                        <option value="Vaquilla"   <?php if($animal->stage == "Vaquilla" ): ?> selected <?php endif; ?>>Vaquilla</option>
                        <option value="Novillo"   <?php if($animal->stage == "Novillo" ): ?> selected <?php endif; ?>>Novillo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Origen:</label>
                    <select class="form-control" id="inputPassword4" name="origen" value="<?php echo e($animal->source); ?>">
                        <option selected></option>
                        <option value="Nacido"   <?php if($animal->source == "Nacido" ): ?> selected <?php endif; ?>>Nacido</option>
                        <option value="Comprado"   <?php if($animal->source == "Comprado" ): ?> selected <?php endif; ?>>Comprado</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Edad-Meses:</label>
                    <input type="int" class="form-control" id="proveedor" name="edad" value="<?php echo e($animal->age_month); ?>">
                </div>
                <div  class="col-md-6">
                    <label for="">Estado de Salud:</label>
                    <select class="form-control" id="inputPassword4" name="estado_de_salud" value="<?php echo e($animal->health_condition); ?>">
                        <option selected></option>
                        <option value="Sano"   <?php if($animal->health_condition == "Sano" ): ?> selected <?php endif; ?>>Sano</option>
                        <option value="Enfermo"   <?php if($animal->health_condition == "Enfermo" ): ?> selected <?php endif; ?>>Enfermo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Embarazo:</label>
                    <select class="form-control" id="inputPassword4" name="estado_de_gestacion" value="<?php echo e($animal->gestation_state); ?>">
                        <option selected></option>
                        <option value="Si"  <?php if($animal->gestation_state == "Si" ): ?> selected <?php endif; ?>>Si</option>
                        <option value="No"  <?php if($animal->gestation_state == "No" ): ?> selected <?php endif; ?>>No</option>
                  </select>
                </div>

                
                <div  class="col-md-6">
                    <label for="">Ubicación:</label>
                    <select class="form-control" id="" name="localizacion"   value="<?php echo e($animal->location_id); ?>">
                            <option></option>
                        <?php $__currentLoopData = $ubicacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($i->id); ?>" <?php if($animal->location_id == $i->id ): ?> selected <?php endif; ?> ><?php echo e($i->location_d); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div> 
                <div class="col-md-6">
                    <label for="">Concebedido:</label>
                    <select class="form-control" id="inputPassword4" name="concebido" value="<?php echo e($animal->conceived); ?>">
                        <option selected></option>
                        <option value="Monta"   <?php if( $animal->conceived == "Monta"): ?> selected <?php endif; ?> >Monta</option>
                        <option value="Insiminacion Artificial"   <?php if( $animal->conceived == "Insiminacion Artificial"): ?> selected <?php endif; ?>>Insiminacion Artificial</option>
                        <option value="Embrional"   <?php if( $animal->conceived == "Embrional"): ?> selected <?php endif; ?>>Embrional</option>
                  </select>
                </div>

                <div  class="col-md-6">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($animal->actual_state); ?>">
                        <option selected></option>
                        <option value="Disponible" <?php if($animal->actual_state == "Disponible" ): ?> selected <?php endif; ?>>Disponible</option>
                        <option value="Vendido"    <?php if($animal->actual_state == "Vendido" ): ?> selected <?php endif; ?>>Vendido</option>
                        <option value="Inactivo"   <?php if($animal->actual_state == "Inactivo" ): ?> selected <?php endif; ?>>Inactivo</option>
                        <option value="Reproduccion"  <?php if($animal->actual_state == "Reproduccion" ): ?> selected <?php endif; ?>>Reproduccion</option>
                  </select>
                </div>
                <div class="col-md-6-self-center" style="margin: 80px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="<?php echo e(url('/fichaAnimal')); ?>">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaAnimal')); ?>" >Guardar</button>
  
                </div>
            </form>
        </div>
    </div>
    
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_animale/edit-animale.blade.php ENDPATH**/ ?>