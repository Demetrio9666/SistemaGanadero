<head>
    <link href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @extends('adminlte::page')
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        @include('messages.message')
        <div class="image"></div>
        <div class="frm">
            <h1>Registro de Desparasitación</h1>
            <form action="{{route('controlDesparasitacion.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Desparasitación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{old('date')}}">
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled value="{{old('codigo_animal')}}" >
                                <input type="hidden" id="idcodi" name="animalCode_id">
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Desparasitante:</label>
                    <select class="form-control" id="des"  name="deworming_id" value="{{old('deworming_id')}}">
                        <option selected></option>
                        @foreach ($des as $i )   
                            <option value="{{$i->id}}" @if(old('deworming_id') == $i->id) {{'selected'}} @endif>{{$i->dewormer_d}}</option>
                        @endforeach
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Fecha de re-desparasitación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r"   value="{{old('date_r')}}">
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                        <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                        <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                     </select>
                </div> 



                <div class="col-md-6-self-center" style="margin: 80px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/controlDesparasitacion')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/controlDesparasitacion') }}" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @include("modal.modalAnimales")
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


