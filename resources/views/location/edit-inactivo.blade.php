@extends('location.base')
@section('nombre_regitro')
Editar ubicación Inactiva
@endsection
@section('formulario')
<form action=" {{route('inactivos.Ubicaciones.update',$ubicacion->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre de ubicación:</label>
        <input type="text" class="form-control" id="location_d" name="location_d" value="{{$ubicacion->location_d}}" onblur="upperCase()" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <input type="text" class="form-control" id="descripcion" name="description" value="{{$ubicacion->description}}" onblur="upperCase()"disabled=disabled>
    </div>      
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$ubicacion->actual_state}}">
            <option value="DISPONIBLE" @if($ubicacion->actual_state == "DISPONIBLE") selected @endif >DISPONIBLE</option>
            <option value="INACTIVO" @if($ubicacion->actual_state == "INACTIVO") selected @endif >INACTIVO</option>
         </select>
    </div> 
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/inactivos/Ubicaciones')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn" href="{{ Redirect::to('/inactivos/Ubicaciones') }}" >Actualizar</button>
        </div>
    </center>    
    @include('layouts.base-usuario')
</form>
@endsection
