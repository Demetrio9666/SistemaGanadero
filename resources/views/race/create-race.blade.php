@extends('race.base')
@section('nombre_regitro')
         Registro de raza
@endsection
@section('formulario')
<form action="{{route('confRaza.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre de la Raza:</label>
        <input type="text" class="form-control {{$errors->has('race_d') ? 'is-invalid':''}}" id="raza" name="race_d" value="{{old('race_d')}}">
        @error('race_d')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Porcentaje %:</label>
        <input type="int" class="form-control {{$errors->has('percentage') ? 'is-invalid':''}}" id="porcentaje" name="percentage" value="{{old('percentage')}}">
        @error('percentage')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>  
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
            <option value="ACTIVO"@if(old('actual_state') == "ACTIVO") {{'selected'}} @endif>ACTIVO</option>
            <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
         </select>
    </div>   
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confRaza')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confRaza') }}" >Guardar</button>
        </div>
    </center>
    @include('layouts.base-usuario')
</form>
@endsection

