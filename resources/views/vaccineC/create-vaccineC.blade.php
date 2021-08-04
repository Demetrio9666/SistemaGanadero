@extends('vaccineC.base')
@section('nombre_regitro')
Registro Control Vacunación
@endsection
@section('formulario')
<form action="{{route('controlVacuna.store')}}" method="POST">
    @csrf
    <div class="row">
            <div class="col-md-6">
                
                    <label for="">Fecha de Vacunación:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{old('date')}}">
            </div>
                <div class="col-md-6"> 
                    <div class="input-group mb-3" style="margin: 33px">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <input type="text" placeholder="Código Animal"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                                <input type="hidden" id="idcodi" name="animalCode_id">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Vacuna:</label>
                    <select class="form-control" id="razas"  name="vaccine_id" value="{{old('vaccine_id')}}">
                        <option selected></option>
                        @foreach ($vacuna as $i )   
                            <option value="{{$i->id}}" @if(old('vaccine_id') == $i->id) {{'selected'}} @endif>{{$i->vaccine_d}}</option>
                        @endforeach
                </select>
                </div>  
                <div class="col-md-6">
                    <label for="">Fecha de Segunda Docis:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{old('date_r')}}">
                </div>
                <div  class="col-md-6">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                        <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
                        <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                    </select>
                </div> 
            
            
            <center>
                <div class="col-md-6 " style="margin: 40px">
                    <a type="submit" class="btn btn-secondary btn"   href="{{url('/controlVacuna')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/controlVacuna') }}" >Guardar</button>
                </div>
            </center>
    </div>      
            </form>

    
    
@endsection
