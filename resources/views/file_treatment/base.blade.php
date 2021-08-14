@extends('adminlte::page')
@section('css')
        <link rel="stylesheet" type="text/css" href="/css/registroTratamientos.css">
@endsection
@section('content_header')
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
 @include("modal.modalAnimalesT")
@endsection
@section('js')
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
                        
            function upperCase() {
                var x=document.getElementById("detalle").value
                document.getElementById("detalle").value=x.toUpperCase()
                var x=document.getElementById("tratamiento").value
                document.getElementById("tratamiento").value=x.toUpperCase()
                            
            }

        </script>
@endsection