
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

               /* $(".btselect").on('click',function(){
                        var currentRow = $(this).closest("tr");
                        var col1=currentRow.find("td:eq(0)").text();
                        var col2=currentRow.find("td:eq(1)").text();
                        $("#idcodi").val(col1);
                        $("#codigo_animal").val(col2);
                });*/
                $('#tabla').on('click','.btselect',function(){
                    var self = $(this).closest("tr");
                    var col1 = self.find(".col1").text();
                    var col2 = self.find(".col2").text();
                        $("#idcodi").val(col1);
                        $("#codigo_animal").val(col2);
                 });

                function cantidadM(id){
                    //cantidadMachos = document.getElementById("cantidadMacho").value;
                        if(id >= 0 && id <=10){
                                 return true;
                         
                            
                        }else{
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se acepta cantidades negativas y mayores a 11',
                                    confirmButtonColor: '#3733dc',
                                }) 
                                document.getElementById("cantidadMacho").value ="";
                            return false;
                        }
                }
                function cantidadH(id){
                    //cantidadMachos = document.getElementById("cantidadMacho").value;
                        if(id >= 0 && id <=10){
                                 return true;
                         
                            
                        }else{
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se acepta cantidades negativas y mayores a 11',
                                    confirmButtonColor: '#3733dc',
                                }) 
                                document.getElementById("cantidadHembra").value ="";
                            return false;
                        }
                }
                function cantidadMU(id){
                    //cantidadMachos = document.getElementById("cantidadMacho").value;
                        if(id >= 0 && id <=10){
                                 return true;
                         
                            
                        }else{
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se acepta cantidades negativas y mayores a 11',
                                    confirmButtonColor: '#3733dc',
                                }) 
                                document.getElementById("cantidadMuertos").value ="";
                            return false;
                        }
                }

             </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/file_partum/base.blade.php ENDPATH**/ ?>