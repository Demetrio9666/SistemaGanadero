@extends('file_reproductionME.base')
@section('nombre_regitro')
Registro de Reproducción Natural Externa
@endsection
@section('formulario')
<form action="{{route('fichaReproduccionEx.store')}}" method="POST">
    @csrf
    <div class="row">
            <div class="form-group">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="" name="date" value="{{old('date')}}">
                @error('date')
                <div class="invalid-feedback">{{$message}}</div>
        @enderror
            </div>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                            <input type="text" class="{{$errors->has('animalCode_id') ? 'is-invalid':''}}" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1" name="codigo_animal" id="codigo_animal" disabled=disabled >
                            <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >
                            <input type="hidden" id="idcodi" name="animalCode_id">
                            <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" id="edad" name="age_month" disabled=disabled value="{{old('edad')}}">
                            <input type="text" placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled value="{{old('sex')}}">
                            @error('animalCode_id')
                               <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
            </div>
            <h5>Animal Macho Externo</h5>
            <br>
            <div class="col-md-6">
                <label for="">Código Animal:</label>
                <input type="text" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="animalCode_Exte" name="animalCode_Exte" onblur="upperCase()" value="{{old('animalCode_Exte')}}">
                @error('animalCode_Exte')
                   <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Raza:</label>
                <select class="form-control {{$errors->has('race_id') ? 'is-invalid':''}}" id="razas" name="race_id" value="{{old('race_id')}}">
                        <option></option>
                    @foreach ( $raza as $i )   
                        <option value="{{$i->id}}" @if(old('race_id') == $i->id) {{'selected'}} @endif>{{$i->race_d}}</option>
                    @endforeach
                </select>
                @error('race_id')
                   <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div> 
            <div  class="col-md-6">
                <label for="">Edad-Meses:</label>
                <input type="int" class="form-control {{$errors->has('age_month') ? 'is-invalid':''}}" id="age_month" name="age_month"  value="{{old('age_month')}}" onChange="Validar(this.value)" >
                @error('age_month')
                   <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Sexo</label>
                <select class="form-control {{$errors->has('sex') ? 'is-invalid':''}}" id="sex"  name="sex" value="{{old('sex')}}">
                    <option></option>
                    
                    <option value="MACHO" @if(old('sex') == "MACHO") {{'selected'}} @endif>MACHO</option>
                </select>
                @error('sex')
                   <div class="invalid-feedback">{{$message}}</div>
               @enderror
            </div>       
            <div class="col-md-6">
                <label for="">Nombre de la Hacienda:</label>
                <input type="text" class="form-control {{$errors->has('hacienda_name') ? 'is-invalid':''}}" id="hacienda_name" name="hacienda_name" value="{{old('hacienda_name')}}" onblur="upperCase()">
                @error('hacienda_name')
                   <div class="invalid-feedback">{{$message}}</div>
               @enderror
            </div>
            <div class="col-md-6">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                    <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                    <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                </select>
            </div>
            <center>
                <div class="form-group" style="margin: 40px">
                    <a type="submit" class="btn btn-secondary btn" href="{{url('/fichaReproduccionEx')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/fichaReproduccionEx') }}" >Guardar</button>
                </div>
            </center>
    </div>
    @include('layouts.base-usuario')
</form>

@endsection
