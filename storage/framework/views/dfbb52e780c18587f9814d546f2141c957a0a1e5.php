
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php $__env->startSection('css'); ?>
            <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    <?php $__env->stopSection(); ?>
    <title>Registration Form</title>
</head>
<body>
    <?php $__env->startSection('content_header'); ?>
    <div class="container" id="registration-form">
        <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="image"></div>
        <div class="frm">
            <h1>Fichas de Reproducción por Monta Interna Inactivas</h1>
            <form action="<?php echo e(route('inactivos.fichaReproduccionM.update', $re->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($re->date); ?>"disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <input type="hidden" id="idcodi" name="animalCode_id_m"  value="<?php echo e($re->animalCode_id_m); ?>">

                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" disabled=disabled  >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                <?php $__currentLoopData = $animalRH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($re->animalCode_id_m == $i->id ): ?>
                                            value =" <?php echo e($i->animalCode); ?> "
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >

                                <span class="input-group-text" id="basic-addon1">Raza</span>
                                <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                                <?php $__currentLoopData = $animalRH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($re->animalCode_id_m == $i->id ): ?>
                                            value =" <?php echo e($i->race_d); ?> "
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >

                                <div  class="col-md-6">
                                    <label for="" class="form-label">Edad:</label>
                                    <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled 
                                    <?php $__currentLoopData = $animalRH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                                value =" <?php echo e($i->age_month); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                </div>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Sexo:</label>
                                    <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled  
                                    <?php $__currentLoopData = $animalRH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_m == $i->id ): ?>
                                                value =" <?php echo e($i->sex); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                </div>
                        </div>

                </div>                
                <div class="form-group"  id="monta_interna"   >
                    <h1>Reproducción por Monta Interna</h1>
                    
                         <div class="input-group mb-3">
                                <input type="hidden" id="idcodi2" name="animalCode_id_p"    value="<?php echo e($re->animalCode_id_p); ?>" disabled=disabled>
                                
                                <div  class="col-md-6">
                                    <label>Codigo Animal:</label>
                                    <input type="text" class="form-control" name="codigo_animal2" id="codigo_animal2"  disabled=disabled 
                                     <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_p == $i->id ): ?>
                                                value =" <?php echo e($i->animalCode); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                                </div>
                                <div  class="col-md-6">
                                    <label>Raza:</label>
                                    <input type="text" class="form-control" name ="raza2" id="raza2"  disabled=disabled 
                                    <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_p == $i->id ): ?>
                                                value =" <?php echo e($i->race_d); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                                </div>


                                <div  class="col-md-6">
                                    <label>Edad:</label>
                                    <input type="text" class="form-control" id="edad2" name="age_month"  name="age_month" disabled=disabled  
                                    <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_p == $i->id ): ?>
                                                value =" <?php echo e($i->age_month); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  >
                                </div>
                                <div  class="col-md-6">
                                    <label >Sexo:</label>
                                    <input type="text" class="form-control" id="sexo2" name="sexo2" disabled=disabled 
                                    <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($re->animalCode_id_p == $i->id ): ?>
                                                value =" <?php echo e($i->sex); ?> "
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                </div>
                              
                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                              <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Codigo Animal</th>
                                        <th>Raza</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Acción</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php $__currentLoopData = $animalRM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
                                      <tr>
                                          <td><?php echo e($i->id); ?></td>
                                          <td><?php echo e($i->animalCode); ?></td>
                                          <td><?php echo e($i->race_d); ?></td>
                                          <td><?php echo e($i->age_month); ?></td>
                                          <td><?php echo e($i->sex); ?></td>
                                          <td> <button type="button" class="btn btn-success btn   btselect2"  data-dismiss="modal" disabled=disabled ><i class="fas fa-check-circle"></i></button></td>
                                          
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                                </tbody>
                            </table>
                            </div>
                        </div>       
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($re->actual_state); ?>">
                        <option value="DISPONIBLE"  <?php if( $re->actual_state == "DISPONIBLE"): ?> selected <?php endif; ?>>DISPONIBLE</option>
                        <option value="INACTIVO" <?php if( $re->actual_state == "INACTIVO"): ?> selected <?php endif; ?>>INACTIVO</option>
                     </select>
                </div>
                <div class="col-md-8-self-center" style="margin: 80px" >
                    <a type="submit" class="btn btn-secondary btn-lg"   href="<?php echo e(url('/inactivos/fichaReproduccionM')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="<?php echo e(Redirect::to('/inactivos/fichaReproduccionM')); ?>" >Guardar</button>
                </div>

            </form>

            
        </div>
    </div>
    <?php echo $__env->make("modal.modalAnimalesR", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
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
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();
                var col5=currentRow.find("td:eq(4)").text();
                
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
                $("#raza").val(col3);
                $("#edad").val(col4);
                $("#sexo").val(col5);
           });

           $(".btselect2").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();
                var col5=currentRow.find("td:eq(4)").text();
                
                $("#idcodi2").val(col1);
                $("#codigo_animal2").val(col2);
                $("#raza2").val(col3);
                $("#edad2").val(col4);
                $("#sexo2").val(col5);
           });
           $(".btselect3").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();

                
                $("#idcodi_ar").val(col1);
                $("#raza3").val(col2);
                $("#material3").val(col3);
                $("#proveedor3").val(col4);
                
           });

           function mostrar(id) {
                if (id == "Monta Interna") {
                     $("#monta_interna").show();
                     $("#reproduccion_ar").show();
        
                }else if(id == "Artificial"){
                    $("#reproduccion_ar").show();
                    
                    
                }
            }

            $(".btnlimpiar").on('click',function(){
                $('#animalCode_id_p').val('');

            });
   </script>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionM/edit-inactivo.blade.php ENDPATH**/ ?>