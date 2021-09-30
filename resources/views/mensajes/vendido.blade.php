@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')
    <br>
    <div class="alert alert-warning alert-dismissable">
        <strong>¡Cuidado!</strong> El animal 
       modificado ya esta Vendido no puede regresar a un estado Disponible en la ficha de <strong>REPRODUCCIÓN.</strong>
    </div>
    <br>
    <center>
        <a type="submit" class="btn btn-primary btn" href="{{url('/fichaAnimal')}}" >Regresar</a>
    </center>
     <br>
@endsection