
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
<?php echo $__env->make('messages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php echo $__env->make("modal.modalAnimalesEX", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
            $('#modalanimalEx').on('shown.bs.modal', function () {
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
           function Validar(id){
                if(id <=21){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'SOLO ANIMALES MAYORES O IGUALES A 21 MESES DE EDAD ',
                    }) 
                    var x=document.getElementById("age_month").value ="";
                }           
                else{
                    console.log('bien')
                }
            }
           function upperCase() {
                var x=document.getElementById("hacienda_name").value
                document.getElementById("hacienda_name").value=x.toUpperCase()
                var x=document.getElementById("animalCode_Exte").value
                document.getElementById("animalCode_Exte").value=x.toUpperCase()
            }

     
</script>

<?php $__env->stopSection(); ?>
 <script>
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
 </script>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_reproductionME/base.blade.php ENDPATH**/ ?>