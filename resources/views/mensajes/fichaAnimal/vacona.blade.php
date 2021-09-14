@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>vacona</strong>  su rango de edad es de 23 a 36 meses.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaAnimal')}}" >Regresar</a>
    </center>
    <br>
@endsection