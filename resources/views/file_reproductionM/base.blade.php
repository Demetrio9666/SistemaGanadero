@extends('adminlte::page')
@section('css')

@endsection
@section('content_header')
@include('messages.message')

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
@include("modal.modalAnimalesR")
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
     
</script>

@endsection
 