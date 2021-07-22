@extends('adminlte::page')
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    @section('title')
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Editar Fichas de Reproduccion Externo Inactivos</h1>
                <form action=" {{route('inactivos.fichaReproduccionEx.update',$ext->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="desp" name="date" value="{{$ext->date}}" disabled=disabled >
                    </div>

                    <div class="form-group">
                        <label for="" class="">Código Animal</label>
                            <div class="input-group mb-3">
                                    <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                    @foreach ($animaleEX as $i)
                                        @if ($ext->animalCode_id == $i->id )
                                            value =" {{$i->animalCode}} "
                                        @endif
                                    @endforeach >
    
                                    <span class="input-group-text" id="basic-addon1">Raza</span>
                                    <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled
                                    @foreach ($animaleEX as $i)
                                        @if ($ext->animalCode_id == $i->id )
                                            value =" {{$i->race_d}} "
                                        @endif
                                    @endforeach >
    
                                    <input type="hidden" id="idcodi" name="animalCode_id"  value="{{$ext->animalCode_id}}">
                        
                                    <div  class="col-md-6">
                                        <label for="" class="form-label">Edad:</label>
                                        <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled
                                        @foreach ($animaleEX as $i)
                                            @if ($ext->animalCode_id == $i->id )
                                                value =" {{$i->age_month}} "
                                            @endif
                                        @endforeach  >
                                    </div>
                                    <div  class="col-md-6">
                                        <label for="" class="form-label">Sexo:</label>
                                        <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled
                                        @foreach ($animaleEX as $i)
                                            @if ($ext->animalCode_id == $i->id )
                                                value =" {{$i->sex}} "
                                            @endif
                                        @endforeach >
                                    </div>
    
                            </div>
    
                    </div>
                    <div class="form-group">
                        <label for="">Codigo Animal Externo:</label>
                        <input type="text" class="form-control" id="raza" name="animalCode_Exte" value="{{$ext->animalCode_Exte}}" disabled=disabled  >
                    </div>


                    <div  class="form-group">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id"  value="{{$ext->race_id}}" disabled=disabled >
                                <option selected>Seleccione la Raza</option>
                            @foreach ( $raza as $i )   
                                <option value="{{$i->id}}" @if($ext->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                            @endforeach
                        </select>
                    </div>  
                


                    <div class="form-group">
                        <label for="">Edad-meses:</label>
                        <input type="int" class="form-control" name="age_month" value="{{$ext->age_month}}" disabled=disabled >
                    </div>  


                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select class="form-control" id="razas"  name="sex" value="{{$ext->sex}}" disabled=disabled >
                            <option>Seleccione</option>
                            <option value="Hembra" @if($ext->sex == "Hembra") selected @endif>Hembra</option>
                            <option value="Macho" @if($ext->sex == "Macho") selected @endif>Macho</option>
                        </select>
                    </div>   


                    <div class="form-group">
                        <label for="">Nombre Hacienda:</label>
                        <input type="text" class="form-control"  name="hacienda_name" value="{{$ext->hacienda_name}}" disabled=disabled >
                    </div> 
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state"  value="{{$ext->actual_state}}">
                            <option value="Disponible" @if( $ext->actual_state == "Disponible") selected @endif>Disponible</option>
                            <option value="Inactivo" @if( $ext->actual_state == "Inactivo") selected @endif>Inactivo</option>
                         </select>
                    </div> 
                    
                    
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/inactivos/fichaReproduccionEx')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/inactivos/fichaReproduccionEx') }}" >Actualizar</button>
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