
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php $__env->startSection('css'); ?>
             <link rel="stylesheet" type="text/css" href="/css/registro.css">
    <?php $__env->stopSection(); ?>
    <title>Registration Form</title>
</head>
        <?php $__env->startSection('content_header'); ?>
                    <div class="container" id="registration-form">
                        <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="image"></div>
                        <div class="frm">
                            
                            <h1>Registro de Animales</h1>
                            <form action="<?php echo e(route('fichaAnimal.store')); ?>" method="POST" class="row g-3" >
                                  <?php echo csrf_field(); ?>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Código Animal:</label>
                                    <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="<?php echo e(old('codigo_animal')); ?>">
                                </div>
                               
                                      
                                <div  class="col-md-6">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_n" name="fecha_nacimiento"  value="<?php echo e(old('fecha_nacimiento')); ?>">
                                </div>
                    

                                <div  class="col-md-6">
                                    <label for="">Raza:</label>
                                    <select class="form-control" id="razas" name="raza"   value="<?php echo e(old('raza')); ?>">
                                            <option selected>  </option>
                                        <?php $__currentLoopData = $raza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                            <option value="<?php echo e($i->id); ?>" <?php if(old('raza') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($i->race_d); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>  
                                <div  class="col-md-6">
                                    <label for="">Sexo:</label>
                                    <select class="form-control" id="opsexo" name="sexo"  value="<?php echo e(old('sexo')); ?>" onChange="mostrar(this.value)">
                                        <option selected></option>
                                        <option id ="Macho" value="Macho"  <?php if(old('sexo') == "Macho"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Macho</option>
                                        <option id="Hembra" value="Hembra" <?php if(old('sexo') == "Hembra"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Hembra</option>
                                </select>
                                </div> 
                                <div  class="col-md-6">
                                    <label for="">Etapa de vida:</label>
                                    <select class="form-control" id="opetapa" name="etapa"  value="<?php echo e(old('etapa')); ?>"  >
                                        <option selected></option>
                                        <option id ="T" value="Ternero" <?php if(old('etapa') == "Ternero"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">Ternero</option>
                                        <option  id ="V" value="Vaca" <?php if(old('etapa') == "Vaca"): ?> <?php echo e('selected'); ?> <?php endif; ?> style="display: none;">Vaca</option>
                                        <option id ="VA" value="Vaconilla"<?php if(old('etapa') == "Vaconilla"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">Vaconilla</option>
                                        <option  id ="VACO" value="Vacona"<?php if(old('etapa') == "Vacona"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">Vacona</option>
                                        <option id ="TO"value="Toro" <?php if(old('etapa') == "Toro"): ?> <?php echo e('selected'); ?> <?php endif; ?> style="display: none;" >Toro</option>
                                        <option id="TORE" value="Torete"<?php if(old('etapa') == "Torete"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">Torete</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Origen:</label>
                                    <select class="form-control" id="origen" name="origen"  value="<?php echo e(old('origen')); ?>">
                                        <option selected></option>
                                        <option value="Nacido"<?php if(old('origen') == "Nacido"): ?> <?php echo e('selected'); ?><?php endif; ?>>Nacido</option>
                                        <option value="Comprado"<?php if(old('origen') == "Comprado"): ?> <?php echo e('selected'); ?><?php endif; ?>>Comprado</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Edad-Meses:</label>
                                    <input type="int" class="form-control" id="edad" name="edad"  value="<?php echo e(old('edad')); ?>" onChange="ValidarEdad(this.value)">
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado de Salud:</label>
                                    <select class="form-control" id="salud" name="estado_de_salud"  value="<?php echo e(old('estado_de_salud')); ?>">
                                        <option selected></option>
                                        <option value="Sano"<?php if(old('estado_de_salud') == "Sano"): ?> <?php echo e('selected'); ?><?php endif; ?>>Sano</option>
                                        <option value="Enfermo"<?php if(old('estado_de_salud') == "Enfermo"): ?> <?php echo e('selected'); ?><?php endif; ?>>Enfermo</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Embarazo:</label>
                                    <select class="form-control" id="embarazo" name="estado_de_gestacion"  value="<?php echo e(old('estado_de_gestacion')); ?>">
                                        <option selected></option>
                                        <option id="SI" value="Si"<?php if(old('estado_de_gestacion') == "Si"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">Si</option>
                                        <option id="NO" value="No"<?php if(old('estado_de_gestacion') == "No"): ?> <?php echo e('selected'); ?><?php endif; ?> style="display: none;">No</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Ubicacion:</label>
                                    <select class="form-control" id="ubicacion" name="localizacion" value="<?php echo e(old('localizacion')); ?>">
                                            <option selected>  </option>
                                        <?php $__currentLoopData = $ubicacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                            <option value="<?php echo e($i->id); ?>" <?php if(old('localizacion') == $i->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($i->location_d); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div> 
                               
                                <div class="col-md-6">
                                    <label for="">Concebedido o creado:</label>
                                    <select class="form-control" id="concedido" name="concebido" value="<?php echo e(old('concebido')); ?>">
                                        <option selected></option>
                                        <option value="Monta"<?php if(old('concebido') == "Monta"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Monta</option>
                                        <option value="Insiminacion Artificial"<?php if(old('concebido') == "Insiminacion Artificial"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Insiminacion Artificial</option>
                                        <option value="Embrional" <?php if(old('concebido') == "Embrional"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Embrional</option>
                                </select>
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado Actual:</label>
                                    <select class="form-control" id="estado" name="actual_state" value="<?php echo e(old('actual_state')); ?>">
                                        <option value="Disponible"<?php if(old('actual_state') == "Disponible"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Disponible</option>
                                        <option value="Vendido"<?php if(old('actual_state') == "Vendido"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Vendido</option>
                                        <option value="Reproduccion"<?php if(old('actual_state') == "Reproduccion"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Reproduccion</option>
                                        <option value="Inactivo"<?php if(old('actual_state') == "Inactivo"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Inactivo</option>
                                </select>
                                </div>
                                

                                <div class="col-md-6-self-center" style="margin: 80px">
                                    
                                        <a type="button"  class="btn btn-secondary btn-lg"   href="<?php echo e(url('/fichaAnimal')); ?>">Cancelar</a>
                                        <button type="sutmit" id="btguardar" class="btn btn-success btn-lg"  style="margin: 10px" href="<?php echo e(Redirect::to('/fichaAnimal')); ?>" >Guardar</button>
                
                                </div>
                            </form>
                        </div>
                    </div>


                   
                    
<script>

function mostrar(id) {
    if (id == "Hembra") {
        $("#T").show();
        $("#V").show();
        $("#VA").show();
        $("#VACO").show();
        $("#SI").show();
        $("#NO").show();
        $("#TO").hide();
        $("#TORE").hide();
    }else{
        $("#T").show();
        $("#V").hide();
        $("#VA").hide();
        $("#VACO").hide();
        $("#SI").hide();
        $("#TO").show();
        $("#TORE").show();
        $("#NO").show();
    }
}

function ValidarEdad(id){
    sexo = document.getElementById("opsexo").value;
    etapa = document.getElementById("opetapa").value;
    
    if(sexo == "Macho"){
        if(etapa == "Ternero"){
            if(id < 0 ||  id  > 3){
                
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TERNERO MACHO SU RANGO DE EDAD ES 1 A 3 MESES ',
                        
                    }) 
                document.getElementById("edad").value = "";
                return false; 
            }
            else{
                return true;
            }
        }else if(etapa == "Torete"){
            if(id < 4 ||  id > 20){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TORETE MACHO SU RANGO DE EDAD ES 4 A 20 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false; 
            }
            else{
                return true;
            }

        }else if(etapa == "Toro"){
            if(id < 21 || id >600 ){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TORO  RANGO DE EDAD ES 20 EN ADELANTE ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else{
            return false;
        }

    }else if (sexo == "Hembra"){
        if(etapa == "Ternero"){
            if(id < 0  ||  id > 10){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TERNERO HEMBRA  SU RANGO DE EDAD ES 1 A 10 MESES ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }else{
                return true;
            }
        }else if(etapa == "Vaconilla"){
            if(id < 11  || id > 22){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONILLA HEMBRA  SU RANGO DE EDAD ES 1 A 10 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "Vacona"){
            if(id < 23  || id > 36){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONA HEMBRA  SU RANGO DE EDAD ES 23 A 36 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "Vaca"){
            if(id  < 37 || id >600){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACA  RANGO DE EDAD ES 36 EN ADELANTE ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else{
            return false;
            document.getElementById("edad").value = "";
        }


    }
}


 $("#btguardar").on('click',function(){
        if( $("#codigoAnimal").val() == "" ){
            Swal.fire({
                    position: 'top-center',
                    icon: 'warning',
                    title: 'Notificación',
                    text: 'Tiene datos Vacios',
                    showConfirmButton: true,
                    timer: 15000
                })
          }else {
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Datos Almacenados',
                    showConfirmButton: false,
                    timer: 1500
                    })
          }
        


 });
 
 
         
      
 </script>

<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
})
</script>
                   
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_animale/create-animale.blade.php ENDPATH**/ ?>