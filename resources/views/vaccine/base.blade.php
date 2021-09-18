@extends('adminlte::page')
    @section('css')
        <link rel="stylesheet" type="text/css" href="/css/registroVacuna1.css">
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
        

@endsection
@section('js')
<script>
    function upperCase() {
           var x=document.getElementById("vaccine_d").value
           document.getElementById("vaccine_d").value=x.toUpperCase()
           var x=document.getElementById("supplier").value
           document.getElementById("supplier").value=x.toUpperCase()
       }

</script>
@endsection
