@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-danger">
        <strong>¡Error!</strong> El Campo de busqueda esta vacio.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/dashboard-busqueda')}}" >Regresar</a>
    </center>
    <br>
@endsection