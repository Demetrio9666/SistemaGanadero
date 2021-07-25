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
    <link rel="stylesheet" type="text/css" href="/css/configuracion.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Registar Ubicación</h1>
                <form action="{{route('confUbicacion.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de la ubicación:</label>
                        <input type="text" class="form-control" id="location_d" name="location_d" value="{{old('location_d')}}" onblur="upperCase()">
                    </div>
                    <div class="form-group">
                        <label for="">Descripción:</label>
                        <input type="int" class="form-control" id="descripcion" name="description" value="{{old('description')}}" onblur="upperCase()">
                    </div> 
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                            <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                            <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                         </select>
                    </div>    
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confUbicacion')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confUbicacion') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    <script>
         function upperCase() {
                var x=document.getElementById("location_d").value
                document.getElementById("location_d").value=x.toUpperCase()
                var x=document.getElementById("descripcion").value
                document.getElementById("descripcion").value=x.toUpperCase()
            }

    </script>
    @endsection
</body>