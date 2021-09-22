
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="/css/registroControlVacuna1.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>

<label>Hora:</label>
<br>
<div id="reloj" class="reloj">00 : 00 : 00</div>
<br>
<br>

        <div class="card card-dark">
         
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-book"></i>
                  <?php echo $__env->yieldContent('nombre_regitro'); ?></h3>
             </div>
             
               <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">

                        <?php echo $__env->yieldContent('formulario'); ?>
                        
                    </div>
              </div>
            </div> 
            <?php echo $__env->make("modal.modalAnimales", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('#modalanimal').on('shown.bs.modal', function () {
    $('#myInput2').trigger('focus')
  });

       //$(".btselect").on('click',function(){
           // var currentRow = $(this).closest("tr");
           // var col1=currentRow.find("td:eq(0)").text();
           // var col2=currentRow.find("td:eq(1)").text();
           // $("#idcodi").val(col1);
           // $("#codigo_animal").val(col2);/


       //});
        $('#tabla').on('click','.btselect',function(){
          var self = $(this).closest("tr");
          var col1 = self.find(".col1").text();
          var col2 = self.find(".col2").text();
            $("#idcodi").val(col1);
            $("#codigo_animal").val(col2);
        });

       
   
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vaccineC/base.blade.php ENDPATH**/ ?>