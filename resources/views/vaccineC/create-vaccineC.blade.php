<head>
    <link href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @extends('adminlte::page')
    @section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Registro de  Control de vacunacion </h1>
            <form action="{{route('controlVacuna.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Vacunacion:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_v" >
                </div>
                <div class="form-group">
                    <label for="" class="">Codigo Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1" name="" id="codigo_animal" disabled=disabled >
                                <input type="hidden" id="idcodi" name="animalCode_id">
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Vacuna:</label>
                    <select class="form-control" id="inputPassword4"  name="reproduccion">
                        <option>Seleccione la Vacuna</option>
                        @foreach ($vacuna as $i )   
                            <option value="{{$i->id}}">{{$i->vaccine}}-{{$i->supplier}}</option>
                            
                        @endforeach
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Fecha de Segunda Docis:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_vr" >
                </div>
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/controlVacuna')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/controlVacuna') }}" >Guardar</button>
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