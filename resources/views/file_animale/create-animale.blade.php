@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
             <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    <title>Registration Form</title>
</head>
        @section('content_header')
                    <div class="container" id="registration-form">
                        @include('messages.message')
                        <div class="image"></div>
                        <div class="frm">
                            
                            <h1>Registro de Animales</h1>
                            <form action="{{route('fichaAnimal.store')}}" method="POST" class="row g-3" >
                                  @csrf
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Código Animal:</label>
                                    <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="{{old('codigo_animal')}}" onblur="upperCase()">
                                </div>
                               
                                      
                                <div  class="col-md-6">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_n" name="fecha_nacimiento"  value="{{old('fecha_nacimiento')}}">
                                </div>
                    

                                <div  class="col-md-6">
                                    <label for="">Raza:</label>
                                    <select class="form-control" id="razas" name="raza"   value="{{old('raza')}}">
                                            <option selected>  </option>
                                        @foreach ( $raza as $i )   
                                            <option value="{{$i->id}}" @if(old('raza') == $i->id) {{'selected'}} @endif >{{$i->race_d}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div  class="col-md-6">
                                    <label for="">Sexo:</label>
                                    <select class="form-control" id="opsexo" name="sexo"  value="{{old('sexo')}}" onChange="mostrar(this.value)"   >
                                        <option selected></option>
                                        <option id ="MACHO" value="MACHO"  @if(old('sexo') == "MACHO") {{'selected'}} @endif>MACHO</option>
                                        <option id="HEMBRA" value="HEMBRA" @if(old('sexo') == "HEMBRA") {{'selected'}} @endif>HEMBRA</option>
                                </select>
                                </div> 
                                <div  class="col-md-6">
                                    <label for="">Etapa de vida:</label>
                                    <select class="form-control" id="opetapa" name="etapa"  value="{{old('etapa')}}" onChange="validarSexo(this.value)" >
                                        <option  selected ></option>
                                        <option id ="T" value="TERNERO" @if(old('etapa') == "TERNERO") {{'selected'}}@endif style="display: none;">TERNERO</option>
                                        <option id ="VA" value="VACONILLA"@if(old('etapa') == "VACONILLA") {{'selected'}}@endif style="display: none;">VACONILLA</option>
                                        <option  id ="VACO" value="VACONA"@if(old('etapa') == "VACONA") {{'selected'}}@endif style="display: none;">VACONA</option>
                                        <option  id ="V" value="VACA" @if(old('etapa') == "VACA") {{'selected'}} @endif style="display: none;">VACA</option>
                                        <option id="TORE" value="TORETE"@if(old('etapa') == "TORETE") {{'selected'}}@endif style="display: none;">TORETE</option>
                                        <option id ="TO"value="TORO" @if(old('etapa') == "TORO") {{'selected'}} @endif style="display: none;" >TORO</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Origen:</label>
                                    <select class="form-control" id="origen" name="origen"  value="{{old('origen')}}">
                                        <option selected></option>
                                        <option value="NACIDO"@if(old('origen') == "NACIDO") {{'selected'}}@endif>NACIDO</option>
                                        <option value="COMPRADO"@if(old('origen') == "COMPRADO") {{'selected'}}@endif>COMPRADO</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Edad-Meses:</label>
                                    <input type="int" class="form-control" id="edad" name="edad"  value="{{old('edad')}}" onChange="ValidarEdad(this.value)" Disabled=disabled >
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado de Salud:</label>
                                    <select class="form-control" id="salud" name="estado_de_salud"  value="{{old('estado_de_salud')}}">
                                        <option selected></option>
                                        <option value="SANO"@if(old('estado_de_salud') == "SANO") {{'selected'}}@endif>SANO</option>
                                        <option value="ENFERMO"@if(old('estado_de_salud') == "ENFERMO") {{'selected'}}@endif>ENFERMO</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Embarazo:</label>
                                    <select class="form-control" id="embarazo" name="estado_de_gestacion"  value="{{old('estado_de_gestacion')}}">
                                        <option selected></option>
                                        <option id="SI" value="SI"@if(old('estado_de_gestacion') == "SI") {{'selected'}}@endif style="display: none;">SI</option>
                                        <option id="NO" value="NO"@if(old('estado_de_gestacion') == "NO") {{'selected'}}@endif style="display: none;">NO</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Ubicacion:</label>
                                    <select class="form-control" id="ubicacion" name="localizacion" value="{{old('localizacion')}}">
                                            <option selected>  </option>
                                        @foreach ($ubicacion as $i )   
                                            <option value="{{$i->id}}" @if(old('localizacion') == $i->id) {{'selected'}} @endif >{{$i->location_d}}</option>
                                        @endforeach
                                    </select>

                                </div> 
                               
                                <div class="col-md-6">
                                    <label for="">Concebedido o creado:</label>
                                    <select class="form-control" id="concedido" name="concebido" value="{{old('concebido')}}">
                                        <option selected></option>
                                        <option value="MONTA"@if(old('concebido') == "MONTA") {{'selected'}} @endif>MONTA</option>
                                        <option value="INSIMINACIÓN ARTIFICIAL"@if(old('concebido') == "INSIMINACIÓN ARTIFICIAL") {{'selected'}} @endif>INSIMINACIÓN ARTIFICIAL</option>
                                        <option value="EMBRIONAL" @if(old('concebido') == "EMBRIONAL") {{'selected'}} @endif>EMBRIONAL</option>
                                </select>
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado Actual:</label>
                                    <select class="form-control" id="estado" name="actual_state" value="{{old('actual_state')}}">
                                        <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                                        <option value="VENDIDO"@if(old('actual_state') == "VENDIDO") {{'selected'}} @endif>VENDIDO</option>
                                        <option value="REPRODUCCIÓN"@if(old('actual_state') == "REPRODUCCIÓN") {{'selected'}} @endif>REPRODUCCIÓN</option>
                                        <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                                </select>
                                </div>
                                

                                <div class="col-md-6-self-center" style="margin: 80px">
                                    
                                        <a type="button"  class="btn btn-secondary btn-lg"   href="{{url('/fichaAnimal')}}">Cancelar</a>
                                        <button type="sutmit" id="btguardar" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaAnimal') }}" >Guardar</button>
                
                                </div>
                            </form>
                        </div>
                    </div>


                   
                    
<script>

function mostrar(id) {
         document.getElementById("edad").disabled = true;   
         
    if (id == "HEMBRA") {
        document.getElementById("edad").disabled = false;   
        $("#T").show();
        $("#V").show();
        $("#VA").show();
        $("#VACO").show();
        $("#SI").show();
        $("#NO").show();
        $("#TO").hide();
        $("#TORE").hide();
    }else if(id == "MACHO"){
        document.getElementById("edad").disabled = false;   
        $("#T").show();
        $("#V").hide();
        $("#VA").hide();
        $("#VACO").hide();
        $("#SI").hide();
        $("#TO").show();
        $("#TORE").show();
        $("#NO").show();
    }else{
        edad.disabled = true
    }
}

function ValidarEdad(id){
    sexo = document.getElementById("opsexo").value;
    etapa = document.getElementById("opetapa").value;
    
    if(sexo == "MACHO"){
       
        if(etapa == "TERNERO"){
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
       
        if(etapa == "TERNERO"){
            if(id < 0  ||  id > 10){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TERNERO HEMBRA  SU RANGO DE EDAD ES 0 A 10 MESES ',
                        
                    }) 
               
                document.getElementById("edad").value = ""
                return false;
            }else{
                return true;
            }
        }else if(etapa == "VACONILLA"){
            if(id < 11  || id > 22){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONILLA HEMBRA  SU RANGO DE EDAD ES 11 A 22 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = ""
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "VACONA"){
            if(id < 23  || id > 36){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONA HEMBRA  SU RANGO DE EDAD ES 23 A 36 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = ""
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "VACA"){
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


   
 </script>


                   
        
@endsection
