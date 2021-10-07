@extends('vaccineC.base')
@section('nombre_regitro')
Registro Control Vacunación
@endsection
@section('formulario')
<form action="{{route('controlVacuna.store')}}" method="POST" class="formulario-validacion">
    @csrf
    <div class="row">
            <div class="col-md-6">
                
                    <label for="">Fecha de Vacunación:</label>
                    <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha" name="date" value="{{old('date')}}">
                    @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
            </div>
                <div class="col-md-6"> 
                    <div class="input-group mb-3" style="margin: 33px">
                                <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <input type="text" class="{{$errors->has('animalCode_id') ? 'is-invalid':''}}" placeholder="Código Animal"  name="codigo_animal" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                                <input type="hidden" id="idcodi" name="animalCode_id" >
                                @error('animalCode_id')
                                   <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                    </div>
                   
                </div>
               
              
                <div class="col-md-6">
                    <label for="">Vacuna:</label>
                        <select class="form-control {{$errors->has('vaccine_id') ? 'is-invalid':''}}" id="razas"  name="vaccine_id" value="{{old('vaccine_id')}}">
                            <option selected></option>
                           @foreach ($vacuna as $i ) 
                              <option  value="{{$i->id}}" @if(old('vaccine_id') == $i->id) {{'selected'}} @endif>{{$i->vaccine_d}}</option>
                           @endforeach
                        </select>
                        @error('vaccine_id')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                </div>  
                <div class="col-md-6">
                    <label for="">Fecha de próxima dosis:</label>
                    <input type="date" class="form-control {{$errors->has('date_r') ? 'is-invalid':''}}" id="fecha_r" name="date_r" value="{{old('date_r')}}">
                    @error('date_r')
                                <div class="invalid-feedback">{{$message}}</div>
                     @enderror
                </div>
                <div  class="col-md-6">
                    <label for="">Estado actual de la Información:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                        <option value="ACTIVO"@if(old('actual_state') == "ACTIVO") {{'selected'}} @endif>ACTIVO</option>
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
    @include('layouts.base-usuario')
</form>
<script>
    window.onload = function(){
              var fecha = new Date(); //Fecha actual
              var mes = fecha.getMonth()+1; //obteniendo mes
              var dia = fecha.getDate(); //obteniendo dia
              var ano = fecha.getFullYear(); //obteniendo año
              if(dia<10)
                dia='0'+dia; //agrega cero si el menor de 10
              if(mes<10)
                mes='0'+mes //agrega cero si el menor de 10
              document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
            }
  
            ////bloqueo de fechas futuras
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("fecha").setAttribute("max", today);

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("fecha_r").setAttribute("min", today);
  </script>
@endsection
