@extends('mensajes.base')
@section('nombre_regitro')
         Mensaje
@endsection
@section('formulario')

 


    <center>
        <h1>El animal modificado ya esta vacunado con la elección de la vacuna escogida </h1>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-primary btn" href="{{url('controlVacuna')}}" >Regresar</a>
           
        </div>
    </center> 
  

@endsection