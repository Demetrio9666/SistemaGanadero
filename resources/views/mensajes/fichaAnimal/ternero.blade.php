@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>Ternero</strong> su rango de edad es de 0 a 3 meses.
    </div>
    <div class="alert alert-danger">
        <strong>¡Cuidado!</strong> No puede estar en estado de <strong>REPRODUCCIÓN</strong>.
    </div>
    <div class="alert alert-danger">
        <strong>¡Cuidado!</strong> No puede estar en estado de <strong>Embarazo</strong> porque es macho.
    </div>
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaAnimal')}}" >Regresar</a>
    </center>
    <br>
@endsection