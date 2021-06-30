<head>
    <link href="{{asset('css/app.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    @extends('adminlte::page')
    @section('title')
    @section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" type="text/css" href="/css/configuracion.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                <h1>Editar ubicación</h1>
                <form action=" {{route('confUbicacion.update',$ubicacion->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de ubicación:</label>
                        <input type="text" class="form-control" id="raza" name="location" value="{{$ubicacion->location}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Descripción:</label>
                        <input type="text" class="form-control" id="porcentaje" name="description" value="{{$ubicacion->description}}">
                    </div>          
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confUbicacion')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confUbicacion') }}" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
  </body>