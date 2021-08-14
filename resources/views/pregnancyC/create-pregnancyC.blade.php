@extends('pregnancyC.base')
@section('nombre_regitro')
Registro Control de Preñes
@endsection
@section('formulario')
<form action="{{route('controlPrenes.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{old('date')}}">
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3" style="margin: 40px">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="{{old('codigo_animal')}}" disabled=disabled >
                    <input type="hidden" id="idcodi" name="animalCode_id"  value="{{old('animalCode_id')}}"  >
            </div>
        </div>
        
                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id="vitamina1"  name="vitamin_id" value="{{old('vitamin_id')}}">
                        <option selected></option>
                        @foreach ($vitamina as $i )   
                        <option value="{{$i->id}}" @if(old('vitamin_id') == $i->id) {{'selected'}} @endif>{{$i->vitamin_d}}</option>
                        @endforeach
                </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 1 de Vitamina:</label>
                    <select class="form-control" id="vitamina2"  name="alternative1" value="{{old('alternative1')}}">
                        <option selected>N/A</option>
                        @foreach ($vitamina as $i )   
                        <option value="{{$i->vitamin_d}}" @if(old('alternative1') == $i->id) {{'selected'}} @endif>{{$i->vitamin_d}}</option>
                        @endforeach
                </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 2 de Vitamina:</label>
                    <select class="form-control" id="vitamina3"  name="alternative2" value="{{old('alternative2')}}">
                        <option selected>N/A</option>
                        @foreach ($vitamina as $i )   
                            <option value="{{$i->vitamin_d}}" @if(old('alternative2') == $i->id) {{'selected'}} @endif>{{$i->vitamin_d}}</option>
                        @endforeach
                </select>
                </div>  
            
        <div class="form-group">
            <label for="">Observación:</label>
            <textarea class="form-control" id="observation" rows="3" name="observation" value="{{old('observation')}}" onblur="upperCase()">
            {!! old('observation') !!}
            </textarea>
        </div>
    
        <div class="form-group">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{old('date_r')}}">
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
            
                <a type="submit" class="btn btn-secondary btn"   href="{{url('/controlPrenes')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/controlPrenes') }}" >Guardar</button>
            </div>
        </center>
        

    </div>
    @include('layouts.base-usuario')
</form>
@endsection
















