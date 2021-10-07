@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/buscar.css">
@endsection
@section('content_header')
        <div class="card card-dark" style="margin: 17%">
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
  function vacio(id){
    var buscar = document.getElementById("buscar").value;
      if(id == ""){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Campo de busqueda esta vacio',
                
            }) 
      }
        }

</script>



@endsection