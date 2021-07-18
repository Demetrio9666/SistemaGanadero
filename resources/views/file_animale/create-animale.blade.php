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
                                    <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="{{old('codigo_animal')}}">
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
                                    <select class="form-control" id="opsexo" name="sexo"  value="{{old('sexo')}}" onChange="mostrar(this.value)">
                                        <option selected></option>
                                        <option id ="Macho" value="Macho"  @if(old('sexo') == "Macho") {{'selected'}} @endif>Macho</option>
                                        <option id="Hembra" value="Hembra" @if(old('sexo') == "Hembra") {{'selected'}} @endif>Hembra</option>
                                </select>
                                </div> 
                                <div  class="col-md-6">
                                    <label for="">Etapa de vida:</label>
                                    <select class="form-control" id="opetapa" name="etapa"  value="{{old('etapa')}}"  >
                                        <option selected></option>
                                        <option id ="T" value="Ternero" @if(old('etapa') == "Ternero") {{'selected'}}@endif style="display: none;">Ternero</option>
                                        <option  id ="V" value="Vaca" @if(old('etapa') == "Vaca") {{'selected'}} @endif style="display: none;">Vaca</option>
                                        <option id ="VA" value="Vaconilla"@if(old('etapa') == "Vaconilla") {{'selected'}}@endif style="display: none;">Vaconilla</option>
                                        <option  id ="VACO" value="Vacona"@if(old('etapa') == "Vacona") {{'selected'}}@endif style="display: none;">Vacona</option>
                                        <option id ="TO"value="Toro" @if(old('etapa') == "Toro") {{'selected'}} @endif style="display: none;" >Toro</option>
                                        <option id="TORE" value="Torete"@if(old('etapa') == "Torete") {{'selected'}}@endif style="display: none;">Torete</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Origen:</label>
                                    <select class="form-control" id="origen" name="origen"  value="{{old('origen')}}">
                                        <option selected></option>
                                        <option value="Nacido"@if(old('origen') == "Nacido") {{'selected'}}@endif>Nacido</option>
                                        <option value="Comprado"@if(old('origen') == "Comprado") {{'selected'}}@endif>Comprado</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Edad-Meses:</label>
                                    <input type="int" class="form-control" id="edad" name="edad"  value="{{old('edad')}}" onChange="ValidarEdad(this.value)">
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado de Salud:</label>
                                    <select class="form-control" id="salud" name="estado_de_salud"  value="{{old('estado_de_salud')}}">
                                        <option selected></option>
                                        <option value="Sano"@if(old('estado_de_salud') == "Sano") {{'selected'}}@endif>Sano</option>
                                        <option value="Enfermo"@if(old('estado_de_salud') == "Enfermo") {{'selected'}}@endif>Enfermo</option>
                                </select>
                                </div>
                               
                                <div  class="col-md-6">
                                    <label for="">Embarazo:</label>
                                    <select class="form-control" id="embarazo" name="estado_de_gestacion"  value="{{old('estado_de_gestacion')}}">
                                        <option selected></option>
                                        <option id="SI" value="Si"@if(old('estado_de_gestacion') == "Si") {{'selected'}}@endif style="display: none;">Si</option>
                                        <option id="NO" value="No"@if(old('estado_de_gestacion') == "No") {{'selected'}}@endif style="display: none;">No</option>
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
                                        <option value="Monta"@if(old('concebido') == "Monta") {{'selected'}} @endif>Monta</option>
                                        <option value="Insiminacion Artificial"@if(old('concebido') == "Insiminacion Artificial") {{'selected'}} @endif>Insiminacion Artificial</option>
                                        <option value="Embrional" @if(old('concebido') == "Embrional") {{'selected'}} @endif>Embrional</option>
                                </select>
                                </div>
                              
                                <div  class="col-md-6">
                                    <label for="">Estado Actual:</label>
                                    <select class="form-control" id="estado" name="actual_state" value="{{old('actual_state')}}">
                                        <option value="Disponible"@if(old('actual_state') == "Disponible") {{'selected'}} @endif>Disponible</option>
                                        <option value="Vendido"@if(old('actual_state') == "Vendido") {{'selected'}} @endif>Vendido</option>
                                        <option value="Reproduccion"@if(old('actual_state') == "Reproduccion") {{'selected'}} @endif>Reproduccion</option>
                                        <option value="Inactivo"@if(old('actual_state') == "Inactivo") {{'selected'}} @endif>Inactivo</option>
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
    if (id == "Hembra") {
        $("#T").show();
        $("#V").show();
        $("#VA").show();
        $("#VACO").show();
        $("#SI").show();
        $("#NO").show();
        $("#TO").hide();
        $("#TORE").hide();
    }else{
        $("#T").show();
        $("#V").hide();
        $("#VA").hide();
        $("#VACO").hide();
        $("#SI").hide();
        $("#TO").show();
        $("#TORE").show();
        $("#NO").show();
    }
}

function ValidarEdad(id){
    sexo = document.getElementById("opsexo").value;
    etapa = document.getElementById("opetapa").value;
    
    if(sexo == "Macho"){
        if(etapa == "Ternero"){
            if(id < 0 ||  id  > 3){
                
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TERNERO MACHO SU RANGO DE EDAD ES 1 A 3 MESES ',
                        
                    }) 
                document.getElementById("edad").value = "";
                return false; 
            }
            else{
                return true;
            }
        }else if(etapa == "Torete"){
            if(id < 4 ||  id > 20){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TORETE MACHO SU RANGO DE EDAD ES 4 A 20 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false; 
            }
            else{
                return true;
            }

        }else if(etapa == "Toro"){
            if(id < 21 || id >600 ){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TORO  RANGO DE EDAD ES 20 EN ADELANTE ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else{
            return false;
        }

    }else if (sexo == "Hembra"){
        if(etapa == "Ternero"){
            if(id < 0  ||  id > 10){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'TERNERO HEMBRA  SU RANGO DE EDAD ES 1 A 10 MESES ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }else{
                return true;
            }
        }else if(etapa == "Vaconilla"){
            if(id < 11  || id > 22){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONILLA HEMBRA  SU RANGO DE EDAD ES 1 A 10 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "Vacona"){
            if(id < 23  || id > 36){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACONA HEMBRA  SU RANGO DE EDAD ES 23 A 36 MESES ',
                        
                    }) 
                
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else if(etapa == "Vaca"){
            if(id  < 37 || id >600){
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'VACA  RANGO DE EDAD ES 36 EN ADELANTE ',
                        
                    }) 
               
                document.getElementById("edad").value = "";
                return false;
            }
            else{
                return true;
            }

        }else{
            return false;
            document.getElementById("edad").value = "";
        }


    }
}


 $("#btguardar").on('click',function(){
        if( $("#codigoAnimal").val() == "" ){
            Swal.fire({
                    position: 'top-center',
                    icon: 'warning',
                    title: 'Notificación',
                    text: 'Tiene datos Vacios',
                    showConfirmButton: true,
                    timer: 15000
                })
          }else {
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Datos Almacenados',
                    showConfirmButton: false,
                    timer: 1500
                    })
          }
        


 });
 
 
         
      
 </script>

<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
})
</script>
                   
        
@endsection
