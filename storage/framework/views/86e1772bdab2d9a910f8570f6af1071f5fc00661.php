
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
   
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content_header'); ?>
    <div class="container" id="registration-form">
        <?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="image"></div>
        <div class="frm">
            <h1>Editar de  Control de Peso </h1>
            <form action="<?php echo e(route('inactivos.controlPesos.update',$pesoC->id)); ?>"   method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="<?php echo e($pesoC->date); ?>" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                <?php $__currentLoopData = $animal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pesoC->animalCode_id == $i->id ): ?>
                                                 value ="<?php echo e($i->animalCode); ?>"
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                               
                                <input type="hidden" id="idcodi" name="animalCode_id" value="<?php echo e($pesoC->animalCode_id); ?>">
                                
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Peso KG:</label>
                    <input type="text" class="form-control" id="peso" name="weigtht" value="<?php echo e($pesoC->weigtht); ?>" onChange="ValidarPeso(this.value)" disabled=disabled>
                </div>
                
                <div class="form-group">
                    <label for="">Fecha de próximo control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="<?php echo e($pesoC->date_r); ?>" disabled=disabled>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="<?php echo e($pesoC->actual_state); ?>">
                        <option value="Disponible" <?php if( $pesoC->actual_state == "Disponible"): ?> selected <?php endif; ?>>Disponible</option>
                            <option value="Inactivo" <?php if( $pesoC->actual_state == "Inactivo"): ?> selected <?php endif; ?>>Inactivo</option>
                     </select>
                </div> 
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="<?php echo e(url('inactivos/controlPesos')); ?>">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="<?php echo e(Redirect::to('inactivos/controlPesos')); ?>" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make("modal.modalAnimales", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
           });
           function ValidarPeso(id){
            peso = document.getElementById("peso").value;
            var RE = /^\d*(\.\d{1})?\d{0,1}$/;
            if(RE.test(peso) ){
                return true;
            }else{
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'FORMATO NO ACEPTADO EJEMPLO: 00.00 ',
                        
                    }) 
                return false;
            }
        }
   </script>
    <?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/weigthC/edit-inactivo.blade.php ENDPATH**/ ?>