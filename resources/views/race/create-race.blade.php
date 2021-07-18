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
                <h1>Registar Raza</h1>
                <form action="{{route('confRaza.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de la Raza:</label>
                        <input type="text" class="form-control" id="raza" name="race_d" >
                    </div>
                    <div class="form-group">
                        <label for="">Porcentaje:</label>
                        <input type="int" class="form-control" id="porcentaje" name="percentage">
                    </div>  
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state">
                            <option value="Disponible">Disponible</option>
                            <option value="Inactivo">Inactivo</option>
                         </select>
                    </div>   
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confRaza')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confRaza') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
</body>