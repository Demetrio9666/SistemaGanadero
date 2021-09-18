@extends('adminlte::page')
    @section('css')
        <link rel="stylesheet" type="text/css" href="/css/registroPartos11.css">
    @endsection
    @section('content_header')
    <label>Hora:</label>
    <br>
    <div id="reloj" class="reloj">00 : 00 : 00</div>
    <br>
    <br>
        <div class="card card-dark">
                <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-book"></i>
                    @yield('nombre_regitro')  </h3>

                </div>
        
               <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">

                        @yield('formulario')
                                                
                    </div>
                </div>
        </div> 
        
    @include("modal.modalAnimalesP")
        @endsection
            @section('js')
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
        @endsection
