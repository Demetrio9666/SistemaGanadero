@extends('race.base')
@section('nombre_regitro')
         Editar Raza Inactiva
@endsection
@section('formulario')
<form action=" {{route('inactivos.Razas.update',$raza->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre de la Raza:</label>
        <input type="text" class="form-control" id="raza" name="race_d" value="{{$raza->race_d}}" disabled=disabled >
    </div>
    <div class="form-group">
        <label for="">Porcentaje %:</label>
        <input type="int" class="form-control" id="porcentaje" name="percentage" value="{{$raza->percentage}}" disabled=disabled>
    </div>      
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$raza->actual_state}}">
            <option value="ACTIVO" @if( $raza->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $raza->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>     
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn"href="{{url('inactivos/Razas')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('inactivos/Razas') }}" >Guardar</button>
        </div>
    </center>
    @include('layouts.base-usuario')
</form>
@endsection
