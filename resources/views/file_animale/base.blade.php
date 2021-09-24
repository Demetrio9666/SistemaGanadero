@extends('adminlte::page')
@section('css')
        <link rel="stylesheet" type="text/css" href="/css/registroAnimal2.css">
        <link rel="stylesheet" type="text/css" href="/css/imagen.css">
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
            function mostrar(id) {
                    document.getElementById("edad").disabled = true;   
                    etapa = document.getElementById("opetapa").value;
                if (id == "HEMBRA") {
                    document.getElementById("edad").disabled = false;   
                    $("#TH").show();
                    $("#TM").hide();
                    $("#V").show();
                    $("#VA").show();
                    $("#VACO").show();
                   // $("#SI").show();
                   // $("#NO").show();
                    $("#TO").hide();
                    $("#TORE").hide();
                }else if(id == "MACHO"){
                    document.getElementById("edad").disabled = false;   
                    $("#TH").hide();
                    $("#TM").show();
                    $("#V").hide();
                    $("#VA").hide();
                    $("#VACO").hide();
                //$("#SI").hide();
                    $("#TO").show();
                    $("#TORE").show();
               // $("#NO").show();
                }else{
                    edad.disabled = true
                }
            }

            function ValidarEdad(id){
                sexo = document.getElementById("opsexo").value;
                etapa = document.getElementById("opetapa").value;
                
                if(sexo == "MACHO"){
                    if(etapa == "TERNERO"){
                            $("#REPRODUCCIÓN").hide();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").hide();
                            $("#NO").show();
                        if(id < 0 ||  id  > 3){
                            
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'TERNERO MACHO SU RANGO DE EDAD ES 1 A 3 MESES ',
                                    
                                }) 
                            document.getElementById("edad").value = ""
                           
                            return false; 
                        }
                        else{
                            return true;
                        }
                    }else if(etapa == "TORETE"){
                            $("#REPRODUCCIÓN").hide();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").hide();
                            $("#NO").show();
                        if(id < 4 ||  id > 20){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'TORETE MACHO SU RANGO DE EDAD ES 4 A 20 MESES ',
                                    
                                }) 
                            
                            document.getElementById("edad").value = ""
                            return false; 
                        }
                        else{
                            return true;
                        }

                    }else if(etapa == "TORO"){
                            $("#REPRODUCCIÓN").show();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").hide();
                            $("#NO").show();
                        if(id < 21 || id >600 ){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'TORO  RANGO DE EDAD ES 20 MESES EN ADELANTE ',
                                    
                                }) 
                        
                            document.getElementById("edad").value = ""
                            return false;
                        }
                        else{
                            return true;
                        }

                    }else{
                        return false;
                    }

                }else if (sexo == "HEMBRA"){
                
                    if(etapa == "TERNERA"){
                            $("#REPRODUCCIÓN").hide();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").hide();
                            $("#NO").show();
                        
                        if(id < 0  ||  id > 10){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'TERNERA SU RANGO DE EDAD ES 0 A 10 MESES ',
                                    
                                }) 
                        
                            document.getElementById("edad").value = ""
                          
                            return false;
                        }else{
                            return true;
                        }
                    }else if(etapa == "VACONILLA"){
                            $("#REPRODUCCIÓN").hide();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").hide();
                            $("#NO").show();
                        if(id < 11  || id > 22){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACONILLA SU RANGO DE EDAD ES 11 A 22 MESES ',
                                    
                                }) 
                            
                            document.getElementById("edad").value = ""
                           
                            return false;
                        }
                        else{
                            return true;
                        }

                    }else if(etapa == "VACONA"){
                            $("#REPRODUCCIÓN").show();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").show();
                            $("#NO").show();
                        if(id < 23  || id > 36){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACONA SU RANGO DE EDAD ES 23 A 36 MESES ',
                                    
                                }) 
                            
                            document.getElementById("edad").value = ""
                           
                            return false;
                        }
                        else{
                            return true;
                        }

                    }else if(etapa == "VACA"){
                            $("#REPRODUCCIÓN").show();
                            $("#DISPONIBLE").show();
                            $("#VENDIDO").show();
                            $("#INACTIVO").show();
                            $("#SI").show();
                            $("#NO").show();
                        if(id  < 37 || id >600){
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACA  RANGO DE EDAD ES 36 MESES EN ADELANTE ',
                                    
                                }) 
                        
                            document.getElementById("edad").value = ""
                           
                            return false;
                        }
                        else{
                            return true;
                        }

                    }else{
                        
                    
                        document.getElementById("edad").value = ""
                        return false;
                    }


                }

            }
                        
            function upperCase() {
                var x=document.getElementById("codigoAnimal").value
                document.getElementById("codigoAnimal").value=x.toUpperCase()
                            
            }

           function validarEmbarazo(id){
                etapa = document.getElementById("opetapa").value;
                if(etapa == "VACA" || etapa == "VACONA"){
                    $("#SI").show();
                    if( id == "SI"){
                        
                        $("#DISPONIBLE").show();
                        $("#VENDIDO").show();
                        $("#INACTIVO").show();
                        $("#REPRODUCCIÓN").hide();
                    }                 
                }else{
                    $("#SI").hide();
                    $("#DISPONIBLE").show();
                    $("#VENDIDO").show();
                    $("#INACTIVO").show();
                    $("#REPRODUCCIÓN").show();
                }
                if( id == "SI"){
                    $("#DISPONIBLE").show();
                    $("#VENDIDO").show();
                    $("#INACTIVO").show();
                    $("#REPRODUCCIÓN").hide();

                }else{
                    $("#DISPONIBLE").show();
                    $("#VENDIDO").show();
                    $("#INACTIVO").show();
                    $("#REPRODUCCIÓN").show();
                }
            }

            function validarEdadyEtapa(id){
                sexo = document.getElementById("opsexo").value;
                edad = document.getElementById("edad").value;
                if(sexo == "MACHO"){
                    if(id == "TM"){
                        if(edad < 0 ||  edad  > 3){
                            return true;
                        }else{
                            Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'TERNERO MACHO SU RANGO DE EDAD ES 1 A 3 MESES ',
                                        
                                    }) 
                                document.getElementById("edad").value = ""
                                return false; 
                        }

                    }else if(id == "TORE" ){
                        if(edad < 4 ||  edad > 20){
                            return true;
                        }else{
                            Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'TORETE MACHO SU RANGO DE EDAD ES 4 A 20 MESES ',
                                        
                                    }) 
                                
                                document.getElementById("edad").value = ""
                                return false; 
                        }

                    }else if(id == "TORO"){
                            if(edad < 21 || edad >600){
                                return true;
                            }else{
                                Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'TORO  RANGO DE EDAD ES 20 MESES EN ADELANTE ',
                                        
                                    }) 
                            
                                document.getElementById("edad").value = ""
                                return false;
                            }
                    
                    }else{
                        return false;
                    }


                }else if(sexo == "HEMBRA"){

                    if(id == "TH"){
                            if(edad < 0  ||  edad > 10){
                                return true;
                            }else{
                                    Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'TERNERA SU RANGO DE EDAD ES 0 A 10 MESES ',
                                            
                                        }) 
                                
                                    document.getElementById("edad").value = ""
                                    return false;
                            }
                    }else if( id  =="VA"){
                                if(edad < 11  || edad > 22){
                                    return true;
                                }else{
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACONILLA SU RANGO DE EDAD ES 11 A 22 MESES ',
                                    
                                }) 
                            
                                    document.getElementById("edad").value = ""
                                    return false;
                                }

                    }else if(id == "VACO" ){
                                if(edad < 23  || edad > 36){
                                    return true;
                                }else{
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACONA SU RANGO DE EDAD ES 23 A 36 MESES ',
                                    
                                }) 
                            
                                    document.getElementById("edad").value = ""
                                    return false;
                                }

                    }else if(id == "V"){
                            if(edad  < 37 || edad >600){
                                    return true;
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'VACA  RANGO DE EDAD ES 36 MESES EN ADELANTE ',
                                    
                                }) 
                        
                                    document.getElementById("edad").value = ""
                                    return false;
                            }

                    }else{
                        return false;
                    }

                }else{
                    return false;
                }



            
                

                


            }
            
            document.getElementById("imagen").onchange=function(e){
                let reader= new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                reader.onload=function(){
                    let imagenPreview=document.getElementById("imagenPreview");
                        image=document.createElement("img");
                        image.src=reader.result;

                        imagenPreview.innerHTML='';
                        imagenPreview.append(image);

                }
            }

          
        </script>
@endsection