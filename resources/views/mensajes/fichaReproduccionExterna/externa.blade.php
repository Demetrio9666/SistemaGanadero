@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal ya consta en la ficha <strong>REPRODUCCIÓN</strong> por monta natural externa.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaReproduccionEx')}}" >Regresar</a>
    </center>
    <br>
@endsection