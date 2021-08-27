@extends('weigthC.base')
@section('nombre_regitro')
         Registro Peso de Animales
@endsection
@section('formulario')
<form action="{{route('controlPeso.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha_r" name="date" value="{{old('date')}}" >
            @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
        </div>
        <div class="col-md-6">
          
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text" class="{{$errors->has('date') ? 'is-invalid':''}}" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                        <input type="hidden" id="idcodi" name="animalCode_id">
                        @error('animalCode_id')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Peso KG:</label>
            <input type="decimal" class="form-control {{$errors->has('weigtht') ? 'is-invalid':''}}" id="peso" name="weigtht" onChange="ValidarPeso(this.value)" value="{{old('weigtht')}}" >
            @error('weigtht')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha_rv" name="date_r" value="{{old('date_r')}}">
            @error('date_r')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
        </div>
        <div  class="col-md-6">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                    <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn"   href="{{url('/controlPeso')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/controlPeso') }}" >Guardar</button>
            </div>
        </center>
    </div>
    @include('layouts.base-usuario')
</form>

@endsection

