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
                <h1>Editar Raza Inactivas</h1>
                <form action=" {{route('inactivos.Razas.update',$raza->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de la Raza:</label>
                        <input type="text" class="form-control" id="raza" name="race_d" value="{{$raza->race_d}}" disabled=disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Porcentaje:</label>
                        <input type="int" class="form-control" id="porcentaje" name="percentage" value="{{$raza->percentage}}" disabled=disabled>
                    </div>      
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$raza->actual_state}}" >
                            <option value="DISPONIBLE" @if( $raza->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                            <option value="INACTIVO" @if( $raza->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                         </select>
                    </div>     
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('inactivos/Razas')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('inactivos/Razas') }}" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
  </body>