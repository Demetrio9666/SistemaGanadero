@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
    <link href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
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
                                <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled >
                            </div>
                            <div  class="col-md-6">
                                <label for="" class="form-label">Sexo:</label>
                                <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled>
                            </div>
    
                            </div>
    
                    </div>
                    <div class="col-md-6">
                        <label for="">Codigo Animal Externo:</label>
                        <input type="text" class="form-control" id="desp" name="animalCode_Exte" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id">
                                <option></option>
                            @foreach ( $raza as $i )   
                                <option value="{{$i->id}}">{{$i->race_d}}</option>
                            @endforeach
                        </select>

                    </div> 
                    <div class="form-group">
                        <label for="">Edad-meses:</label>
                        <input type="int" class="form-control" name="age_month">
                    </div>  
                    
                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select class="form-control" id="razas"  name="sex">
                            <option></option>
                            <option value="Hembra">Hembra</option>
                            <option value="Macho">Macho</option>
                        </select>
                        
                    </div>       

                    <div class="form-group">
                        <label for="">Nombre de la Hacienda:</label>
                        <input type="text" class="form-control"  name="hacienda_name">
                    </div>

                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state">
                            <option>Disponible</option>
                            <option>Inactivo</option>
                         </select>
                    </div>

                    <div class="form-group" style="margin: 50px">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/fichaReproduccionEx')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/fichaReproduccionEx') }}" >Guardar</button>
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
    </script>
    @endsection
</body>