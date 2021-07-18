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
            <h1>Registro control de Parto</h1>
            <form action="{{route('fichaParto.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Control:</label>
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
                    <label for="">Cant.Machos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="male" >
                </div>

                <div class="form-group">
                    <label for="">Cant.Hembras:</label>
                    <input type="number" class="form-control" id="fecha_r" name="female" >
                </div>
                <div class="form-group">
                    <label for="">Cant.Muertos:</label>
                    <input type="number" class="form-control" id="fecha_r" name="dead" >
                </div>
                <div class="form-group">
                    <label for="">Estado de la Madre:</label>
                    <select class="form-control" id="inputPassword4" name="mother_status">
                        <option selected></option>
                        <option>Viva</option>
                        <option>Muerta</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Tipo de Parto:</label>
                    <select class="form-control" id="inputPassword4" name="partum_type">
                        <option selected></option>
                        <option>Natural</option>
                        <option>Cesárea</option>
                  </select>
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state">
                        <option>Disponible</option>
                        <option>Inactivo</option>
                     </select>
                </div>

                <div class="col-md-6-self-center" style="margin: 50px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaParto')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaParto') }}" >Guardar</button>
  
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