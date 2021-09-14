@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal modificado <strong>Hembra</strong> solo tiene las siguientes etapas.
        <br>
        *TERNERA
        <br>
        *VACONILLA
        <br>
        *VACONA
        <br>
        *VACA

    </div>
    
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaAnimal')}}" >Regresar</a>
    </center>
    <br>
@endsection