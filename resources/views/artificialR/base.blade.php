@extends('adminlte::page')
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/registroMaterial.css">
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
        

        @endsection
        @section('js')
        <script>
           function upperCase() {
                var x=document.getElementById("proveedor").value
                document.getElementById("proveedor").value=x.toUpperCase()
               
            }

         </script>

        @endsection
