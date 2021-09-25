@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
<br>
        <div class="alert alert-warning alert-dismissable">
            <strong>¡Cuidado!</strong> El animal ingresado ya esta desparasitacido .
        </div>
        <br>
        <center>
            <a type="submit" class="btn btn-primary btn" href="{{url('controlDesparasitacion/create')}}" >Regresar</a>
        </center>
        <br>

@endsection