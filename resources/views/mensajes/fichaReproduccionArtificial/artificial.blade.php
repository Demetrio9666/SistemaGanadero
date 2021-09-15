@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal ya consta en la ficha <strong>REPRODUCCIÓN</strong> artificial.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaReproduccionA')}}" >Regresar</a>
    </center>
    <br>
@endsection