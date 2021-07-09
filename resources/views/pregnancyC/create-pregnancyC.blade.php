<head>
    <link href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @extends('adminlte::page')
    @section('css')
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Registro control de Preñes</h1>
            <form action="{{route('controlPrenes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_c" >
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
                            <label for="">Vitamina:</label>
                            <select class="form-control" id="vitamina1"  name="vitamin_id">
                                <option selected>Seleccione la Vitamina</option>
                                @foreach ($vitamina as $i )   
                                    <option value="{{$i->id}}">{{$i->vitamin_d}}</option>
                                @endforeach
                        </select>
                        </div>  
                        <div class="form-group">
                            <label for="">Alternativa 1 de Vitamina:</label>
                            <select class="form-control" id="vitamina2"  name="alternative1">
                                <option selected>N/A</option>
                                @foreach ($vitamina as $i )   
                                    <option {{$i->id}} value="{{$i->vitamin_d}}">{{$i->vitamin_d}}</option>
                                @endforeach
                        </select>
                        </div>  
                        <div class="form-group">
                            <label for="">Alternativa 2 de Vitamina:</label>
                            <select class="form-control" id="vitamina3"  name="alternative2">
                                <option selected>N/A</option>
                                @foreach ($vitamina as $i )   
                                    <option {{$i->id}} value="{{$i->vitamin_d}}">{{$i->vitamin_d}}</option>
                                @endforeach
                        </select>
                        </div>  
                    
                <div class="form-group">
                    <label for="">Observación:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observation"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Fecha de próximo control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_rc" >
                </div>

                <div class="col-md-6-self-center" style="margin: 80px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/controlPrenes')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/controlPrenes') }}" >Guardar</button>
  
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