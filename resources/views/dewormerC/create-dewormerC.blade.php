@extends('dewormerC.base')
@section('nombre_regitro')
Registro Control de Desparasitación
@endsection
@section('formulario')
<form action="{{route('controlDesparasitacion.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{old('date')}}">
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3" style="margin: 40px">
                    <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="{{old('codigo_animal')}}" disabled=disabled >
                    <input type="hidden" id="idcodi" name="animalCode_id"  value="{{old('animalCode_id')}}"  >
            </div>
    
</div>
        <div class="col-md-6">
            <label for="">Desparasitante:</label>
            <select class="form-control" id="des"  name="deworming_id" value="{{old('deworming_id')}}">
                <option selected></option>
                @foreach ($des as $i )   
                    <option value="{{$i->id}}" @if(old('deworming_id') == $i->id) {{'selected'}} @endif>{{$i->dewormer_d}}</option>
                @endforeach
          </select>
        </div>  
        <div class="col-md-6">
            <label for="">Fecha de re-desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r"   value="{{old('date_r')}}">
        </div>
        <div  class="form-group">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
             </select>
        </div> 
    
    
    <center>
        <div class="col-md-6" style="margin: 40px">
            
            <a type="submit" class="btn btn-secondary btn"   href="{{url('/controlDesparasitacion')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/controlDesparasitacion') }}" >Guardar</button>
    </div>
    </center>
    @include('layouts.base-usuario')
    </form>
    </div>
    
@endsection
