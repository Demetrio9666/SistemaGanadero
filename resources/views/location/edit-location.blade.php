@extends('adminlte::page')
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    
    @section('title')
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/configuracion.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Editar ubicación</h1>
                <form action=" {{route('confUbicacion.update',$ubicacion->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de ubicación:</label>
                        <input type="text" class="form-control" id="raza" name="location_d" value="{{$ubicacion->location_d}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Descripción:</label>
                        <input type="text" class="form-control" id="porcentaje" name="description" value="{{$ubicacion->description}}">
                    </div>      
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$ubicacion->actual_state}}">
                            <option value="DISPONIBLE" @if($ubicacion->actual_state == "DISPONIBLE") selected @endif >DISPONIBLE</option>
                            <option value="INACTIVO" @if($ubicacion->actual_state == "INACTIVO") selected @endif >INACTIVO</option>
                         </select>
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