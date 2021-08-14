@extends('file_treatment.base')
@section('nombre_regitro')
         Registro de Tratamientos 
@endsection
@section('formulario')

        <form action="{{route('fichaTratamiento.store')}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-6">
                        <label for="">Fecha de Tratamiento:</label>
                        <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha_r" name="date" >
                        @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                    
                            <div class="input-group mb-3" style="margin: 40px">
                                    <button class="btn btn-outline-secondary"  type="button"  id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                   
                                    <input type="text"  placeholder="Código Animal" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >
                                    <input type="hidden" class="{{$errors->has('animalCode_id') ? 'is-invalid':''}}" id="idcodi" name="animalCode_id">
                                    @error('animalCode_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Enfermedad:</label>
                        <select class="form-control {{$errors->has('disease') ? 'is-invalid':''}}" id=""  name="disease" value="{{old('disease')}}">
                            <option selected ></option>
                            <option value="FALTA DE APETITO" @if(old('disease') == "FALTA DE APETITO") {{'selected'}}@endif>FALTA DE APETITO</option>
                            <option value="HERIDA" @if(old('disease') == "HERIDA") {{'selected'}}@endif>HERIDA</option>
                            <option value="OTRAS CAUSAS" @if(old('disease') == "OTRAS CAUSAS") {{'selected'}}@endif>OTRAS CAUSAS</option>
                    </select>
                    @error('disease')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Detalle:</label>
                        <textarea class="form-control {{$errors->has('detail') ? 'is-invalid':''}}" id="detalle" rows="3" name="detail" onblur="upperCase()" >
                        {!! old('detail') !!}
                        </textarea>
                        @error('detail')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                        
                    <div class="col-md-6">
                        <label for=""> Antibióticos:</label>
                        <select class="form-control" id=""  name="antibiotic_id" value="{{old('antibiotic_id')}}">
                            <option selected value="">N/A</option>
                            @foreach ($anti as $i )   
                                <option value="{{$i->id}}" @if(old('antibiotic_id') == $i->id) {{'selected'}}@endif>{{$i->antibiotic_d}}</option>
                            @endforeach
                    </select>
                   
                    </div>   

                    <div class="col-md-6">
                        <label for="">Vitamina:</label>
                        <select class="form-control" id=""  name="vitamin_id">
                            <option selected value="" >N/A</option>
                            @foreach ($vitamina as $i )   
                                <option value="{{$i->id}}"@if(old('vitamin_id') == $i->id) {{'selected'}}@endif>{{$i->vitamin_d}}</option>
                            @endforeach
                    </select>
                  
                    </div>  

                    <div class="form-group">
                        <label for="">Tratamiento:</label>
                        <textarea class="form-control {{$errors->has('treatment') ? 'is-invalid':''}}" id="tratamiento" rows="3" name="treatment" onblur="upperCase()" >
                        {!! old('treatment') !!}
                        </textarea>
                        @error('treatment')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    
                    </div>

                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state">
                            <option value="DISPONIBLE">DISPONIBLE</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                        @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <center>
                        <div class="col-md-6-self-center" style="margin: 40px">
                            <a type="submit" class="btn btn-secondary btn"   href="{{url('/fichaTratamiento')}}">Cancelar</a>
                            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/fichaTratamiento') }}" >Guardar</button>
                        </div>
                    </center>
                   
            </div>
            @include('layouts.base-usuario')
      </form>


@endsection