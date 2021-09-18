@extends('adminlte::page')
@section('css')

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
@include("modal.modalAnimalesHembras")
@endsection
@section('js')
<script>
    
      $('#modalanimalhembra').on('shown.bs.modal', function () {
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

        $('#modalanimal').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
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


            $('#tablaHembra').DataTable({
                responsive: true,
            "language": {
                "lengthMenu": "Mostrar "+
                `<select class="custom-select custom-selec form-control form-control">
                        <option value = '10' >10</option> 
                        <option  value = '25' >25</option>
                        <option  value = '50' >50</option>
                        <option  value = '100' >100</option>
                        <option  value =  '-1'>All</option>
                </select>`
                +" Registro por Pagina",
                "zeroRecords": "Resultados No encontrados -Disculpe",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de  _MAX_ Registros Totales)",
                'search': "Buscar:",
                'paginate':{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            },

        });
     
</script>

@endsection
 