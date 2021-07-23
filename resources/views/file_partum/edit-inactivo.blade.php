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
            <h1>Editar Controles de Partos Inactivos</h1>
            <form action="{{route('inactivos.fichaPartos.update',$par->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{$par->date}}" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Código</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animalP as $i)
                                            @if ($par->animalCode_id == $i->id )
                                                 value =" {{$i->animalCode}} "
                                            @endif
                                @endforeach> 
                                <input type="hidden" id="idcodi" name="animalCode_id" value="{{$par->animalCode_id}}">
                        </div>
                </div>        
                <div class="form-group">
                    <label for="">Cant.Machos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="male" value="{{$par->male}}" disabled=disabled>
                </div>

                <div class="form-group">
                    <label for="">Cant.Hembras:</label>
                    <input type="number" class="form-control" id="fecha_r" name="female" value="{{$par->female}}" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="">Cant.Muertos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="dead" value="{{$par->dead}}" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="">Estado de la Madre:</label>
                    <select class="form-control" id="inputPassword4" name="mother_status" value="{{$par->mother_status}}" disabled=disabled>
                        <option selected></option>
                        <option value="VIVA"  @if($par->mother_status == "VIVA" ) selected @endif >VIVA</option>
                        <option value="MUERTA" @if($par->mother_status == "MUERTA" ) selected @endif  >MUERTA</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Tipo de Parto:</label>
                    <select class="form-control" id="inputPassword4" name="partum_type" value="{{$par->partum_type}}" disabled=disabled>
                        <option selected></option>
                        <option value="NATURAL"  @if($par->partum_type == "NATURAL" ) selected @endif  >NATURAL</option>
                        <option value="CESÁREA"  @if($par->partum_type == "CESÁREA" ) selected @endif >CESÁREA</option>
                  </select>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$par->actual_state}}">
                        <option value="DISPONIBLE" @if( $par->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                        <option value="INACTIVO" @if( $par->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                     </select>
                </div> 
                <div class="col-md-6-self-center" style="margin: 80px">
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/inactivos/fichaPartos')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaPartos') }}" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @include("modal.modalAnimalesP")
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