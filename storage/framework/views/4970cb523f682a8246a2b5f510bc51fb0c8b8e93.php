
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="/css/registroPartos11.css">
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
                    <?php echo $__env->yieldContent('nombre_regitro'); ?>  </h3>

                </div>
        
               <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">

                        <?php echo $__env->yieldContent('formulario'); ?>
                        
                    </div>
                </div>
        </div> 
        
    <?php echo $__env->make("modal.modalAnimalesP", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
            <script>
                $('#modalanimal').on('shown.bs.modal', function () {
                $('#myInput2').trigger('focus')
              });
        
                    $('#tabla').on('click','.btselect',function(){
                        var self = $(this).closest("tr");
                        var col1 = self.find(".col1").text();
                        var col2 = self.find(".col2").text();
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
                                title: 'Error',
                                text: 'Formato no aceptado ejemplo 00.00 ',
                                confirmButtonColor: '#3733dc',
                            }) 
                            document.getElementById("peso").value ="";
                        return false;
                    }
                }
           </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/weigthC/base.blade.php ENDPATH**/ ?>