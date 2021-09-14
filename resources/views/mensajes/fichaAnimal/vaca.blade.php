@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>vaca</strong>  su rango de edad es de 37 meses en adelante.
    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaAnimal')}}" >Regresar</a>
    </center>
    <br>
@endsection