@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    @endsection
    <title>Registration Form</title>
</head>
<body>
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Registar Ficha de Reproduccion Externo</h1>
                <form action="{{route('fichaReproduccionEx.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="" name="date" >
                    </div>
                    <div class="form-group">
                        <label for="" class="">Código Animal</label>
                            <div class="input-group mb-3">
                                    <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
    
                                    <span class="input-group-text" id="basic-addon1">Raza</span>
                                    <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >
    
                                    <input type="hidden" id="idcodi" name="animalCode_id">
                        
                            <div  class="col-md-6">
                                <label for="" class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled value="{{old('edad')}}">
                            </div>
                            <div  class="col-md-6">
                                <label for="" class="form-label">Sexo:</label>
                                <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled value="{{old('sex')}}">
                            </div>
    
                            </div>
    
                    </div>
                    <div class="col-md-6">
                        <label for="">Codigo Animal Externo:</label>
                        <input type="text" class="form-control" id="animalCode_Exte" name="animalCode_Exte" onblur="upperCase()">
                    </div>
                    <div class="col-md-6">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id" value="{{old('race_id')}}">
                                <option></option>
                            @foreach ( $raza as $i )   
                                <option value="{{$i->id}}" @if(old('race_id') == $i->id) {{'selected'}} @endif>{{$i->race_d}}</option>
                            @endforeach
                        </select>

                    </div> 
                   
                    <div  class="col-md-6">
                        <label for="">Edad-Meses:</label>
                        <input type="int" class="form-control" id="age_month" name="age_month"  value="{{old('age_month')}}" onChange="Validar(this.value)" >
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select class="form-control" id="sex"  name="sex" value="{{old('sex')}}">
                            <option></option>
                            
                            <option value="MACHO" @if(old('sex') == "MACHO") {{'selected'}} @endif>MACHO</option>
                        </select>
                        
                    </div>       

                    <div class="form-group">
                        <label for="">Nombre de la Hacienda:</label>
                        <input type="text" class="form-control" id="hacienda_name" name="hacienda_name" value="{{old('hacienda_name')}}" onblur="upperCase()">
                    </div>

                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                            <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                            <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                         </select>
                    </div>

                    <div class="form-group" style="margin: 50px">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('inactivos/fichaReproduccionEx')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('inactivos/fichaReproduccionEx') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        @include("modal.modalAnimalesEX")
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


           function Validar(id){
                if(id <=21){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'SOLO ANIMALES MAYORES O IGUALES A 21 MESES DE EDAD ',
                        
                    }) 
                   
                    var x=document.getElementById("age_month").value ="";
                    
                }           
                else{
                    console.log('bien')
                }
            }


           function upperCase() {
                var x=document.getElementById("hacienda_name").value
                document.getElementById("hacienda_name").value=x.toUpperCase()
                var x=document.getElementById("animalCode_Exte").value
                document.getElementById("animalCode_Exte").value=x.toUpperCase()
                
            }

           
    </script>
    @endsection
</body>