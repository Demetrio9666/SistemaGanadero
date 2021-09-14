@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal 
       modificado ya esta vacunado con la elección de la vacuna escogida.
    </div>
    <br>
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('controlVacuna')}}" >Regresar</a>
    </center>
     <br>
@endsection