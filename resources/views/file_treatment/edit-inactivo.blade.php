@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        @include('messages.message')
        <div class="image"></div>
        <div class="frm">
            <h1>Editar Tratamientos de animales</h1>
            <form action="{{route('inactivos.fichaTratamientos.update',$tra->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Tratamiento:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{$tra->date}}" disabled=disabled >
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                         
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animalT as $i)
                                            @if ($tra->animalCode_id == $i->id )
                                                 value =" {{$i->animalCode}} "
                                            @endif
                                @endforeach> 
                                <input type="hidden" id="idcodi" name="animalCode_id" value="{{$tra->animalCode_id}}" disabled=disabled >
                        </div>
                </div>        
                <div class="form-group">
                    <label for="">Enfermedad:</label>
                    <select class="form-control" id=""  name="disease"  value="{{$tra->disease}}" disabled=disabled>
                        <option selected ></option>
                        <option value="FALTA DE APETITO" @if($tra->disease == "FALTA DE APETITO" ) selected @endif>FALTA DE APETITO</option>
                        <option value="HERIDA" @if($tra->disease == "HERIDA" ) selected @endif>HERIDA</option>
                        <option value="OTRAS CAUSAS" @if($tra->disease == "OTRAS CAUSAS" ) selected @endif>OTRAS CAUSAS</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Detalle:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail" disabled=disabled >{{$tra->detail}}</textarea>
                </div>

                <div class="form-group">
                    <label for=""> Antibióticos:</label>
                    <select class="form-control" id=""  name="antibiotic_id"   value="{{$tra->antibiotic_id}}" disabled=disabled >
                        <option selected value=""></option>
                        @foreach ($anti as $i )   
                            <option value="{{$i->id}}" @if($tra->antibiotic_id == $i->id ) selected @endif>{{$i->antibiotic_d}}</option>
                        @endforeach
                  </select>
                </div>   

                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id=""  name="vitamin_id"   value="{{$tra->vitamin_id}}" disabled=disabled >
                        <option selected value="" ></option>
                        @foreach ($vitamina as $i )   
                            <option value="{{$i->id}}" @if($tra->vitamin_id == $i->id ) selected @endif>{{$i->vitamin_d}}</option>
                        @endforeach
                  </select>
                </div>  

                <div class="form-group">
                    <label for="">Tratamiento:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="treatment" disabled=disabled > {{$tra->treatment}}</textarea>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$tra->actual_state}}" >
                        <option value="DISPONIBLE" @if( $tra->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                        <option value="INACTIVO" @if( $tra->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                     </select>
                </div>


                <div class="col-md-6-self-center" style="margin: 80px">
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/inactivos/fichaTratamientos')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaTratamientos') }}" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @include("modal.modalAnimalesT")
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
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
           });

   </script>
    @endsection
</body>