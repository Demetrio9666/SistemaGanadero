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
            <h1>Editar Control de Vacunación </h1>
            <form action="{{route('inactivos.controlVacunas.update',$vacunaC->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Vacunación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{$vacunaC->date}}" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animal as $i)
                                            @if ($vacunaC->animalCode_id == $i->id )
                                                 value =" {{$i->animalCode}} "
                                            @endif
                                @endforeach>
                                <input type="hidden" id="idcodi" name="animalCode_id" value="{{$vacunaC->animalCode_id}}">
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Vacuna:</label>
                    <select class="form-control" id="inputPassword4"  name="vaccine_id"   value="{{$vacunaC->vaccine_id}}" disabled=disabled>
                        <option selected></option>
                        @foreach ($vacuna as $i )   
                            <option value="{{$i->id}}" @if($vacunaC->vaccine_id == $i->id ) selected @endif>{{$i->vaccine_d}}</option>
                            
                        @endforeach
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Fecha de Segunda Docis:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$vacunaC->date_r}}" disabled=disabled>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vacunaC->actual_state}}" >
                        <option value="DISPONIBLE" @if( $vacunaC->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                        <option value="INACTIVO" @if( $vacunaC->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                     </select>
                </div> 
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="{{url('inactivos/controlVacunas')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('inactivos/controlVacunas') }}" >Guardar</button>
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