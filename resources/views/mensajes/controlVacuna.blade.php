@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
      
        <div class="alert alert-warning alert-dismissable">
            <strong>¡Cuidado!</strong> El animal ingresado ya esta vacunado con la elección de la vacuna escogida.
        </div>
        <center>
            <a type="submit" class="btn btn-primary btn" href="{{url('controlVacuna/create')}}" >Regresar</a>
        </center>
      

@endsection