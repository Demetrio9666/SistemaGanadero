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
            <h1>Registro Tratamientos de animales</h1>
            <form action="{{route('fichaTratamiento.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Tratamiento:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" >
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                                <input type="hidden" id="idcodi" name="animalCode_id">
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Enfermedad:</label>
                    <select class="form-control" id=""  name="disease">
                        <option selected ></option>
                        <option value="Falta de Apetito">Falta de Apetito</option>
                        <option value="Herida">Herida</option>
                        <option value="Otras causas">Otras causas</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="">Detalle:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
                </div>
                    
                <div class="form-group">
                    <label for=""> Antibióticos:</label>
                    <select class="form-control" id=""  name="antibiotic_id">
                        <option selected value=""></option>
                        @foreach ($anti as $i )   
                            <option value="{{$i->id}}">{{$i->antibiotic_d}}</option>
                        @endforeach
                  </select>
                </div>   

                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id=""  name="vitamin_id">
                        <option selected value="" ></option>
                        @foreach ($vitamina as $i )   
                            <option value="{{$i->id}}">{{$i->vitamin_d}}</option>
                        @endforeach
                  </select>
                </div>  

                <div class="form-group">
                    <label for="">Tratamiento:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="treatment"></textarea>
                </div>

                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state">
                        <option>Disponible</option>
                        <option>Inactivo</option>
                     </select>
                </div>
                <div class="col-md-6-self-center" style="margin: 80px">
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaTratamiento')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaTratamiento') }}" >Guardar</button>
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