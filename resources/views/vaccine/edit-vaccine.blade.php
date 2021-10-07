@extends('vaccine.base')
@section('nombre_regitro')
         Editar Vacuna
@endsection
@section('formulario')
<form action=" {{route('confVacuna.update',$vacuna->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre de la Vacuna:</label>
        <input type="text" class="form-control" id="vaccine_d" name="vaccine_d" value="{{$vacuna->vaccine_d}}" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$vacuna->date_e}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$vacuna->date_c}}" >
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$vacuna->supplier}}" onblur="upperCase()">
    </div>  
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vacuna->actual_state}}">
            <option value="ACTIVO"@if( $vacuna->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $vacuna->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>       
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confVacuna')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confVacuna') }}" >Actualizar</button>
        </div>
    </center>  
    @include('layouts.base-usuario')
</form>
@endsection





















