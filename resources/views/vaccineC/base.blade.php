@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/registroControlVacuna1.css">
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
                  @yield('nombre_regitro')</h3>
             </div>
             
               <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">

                        @yield('formulario')
                        
                    </div>
              </div>
            </div> 
            @include("modal.modalAnimales")
@endsection
@section('js')
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



@endsection