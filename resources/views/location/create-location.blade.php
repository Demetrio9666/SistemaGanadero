@extends('location.base')
@section('nombre_regitro')
         Registro Ubicación
@endsection
@section('formulario')
<form action="{{route('confUbicacion.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre de la ubicación:</label>
        <input type="text" class="form-control {{$errors->has('location_d') ? 'is-invalid':''}}" id="location_d" name="location_d" value="{{old('location_d')}}" onblur="upperCase()">
        @error('location_d')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descripción:</label>
        <input type="int" class="form-control {{$errors->has('description') ? 'is-invalid':''}}" id="descripcion" name="description" value="{{old('description')}}" onblur="upperCase()">
        @error('description')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div> 
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
            <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
            <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
         </select>
    </div>   
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confUbicacion')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confUbicacion') }}" >Guardar</button>
        </div>
    </center> 
    
</form>

@endsection