@extends('adminlte::page')
@section('css')

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
@include("modal.modalAnimalesHembras")
@endsection
@section('js')
<script>
      $('#modalanimal').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
      });
      $('#tablaHembra').on('click','.btselectHembra',function(){
                        var self = $(this).closest("tr");
                        var col1 = self.find(".col1").text();
                        var col2 = self.find(".col2").text();
                        var col3 = self.find(".col3").text();
                        var col4 = self.find(".col4").text();
                        var col5 = self.find(".col5").text();
                        $("#idcodi").val(col1);
                        $("#codigo_animal").val(col2);
                        $("#raza").val(col3);
                        $("#edad").val(col4);
                        $("#sexo").val(col5);
            });
            
           $('#tabla').on('click','.btselectMacho',function(){
                        var self = $(this).closest("tr");
                        var col1 = self.find(".col1").text();
                        var col2 = self.find(".col2").text();
                        var col3 = self.find(".col3").text();
                        var col4 = self.find(".col4").text();
                        var col5 = self.find(".col5").text();
                        $("#idcodi2").val(col1);
                        $("#codigo_animal2").val(col2);
                        $("#raza2").val(col3);
                        $("#edad2").val(col4);
                        $("#sexo2").val(col5);
            });
     
</script>

@endsection
 