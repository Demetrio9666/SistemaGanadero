@extends('file_treatment.base')
@section('nombre_regitro')
Editar Tratamientos de animales Inactivo
@endsection
@section('formulario')
<form action="{{route('inactivos.fichaTratamientos.update',$tra->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Tratamiento:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{$tra->date}}" disabled=disabled >
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                 
                        <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  name="codigo_animal" id="codigo_animal" disabled=disabled 
                        @foreach ($animalT as $i)
                                    @if ($tra->animalCode_id == $i->id )
                                         value =" {{$i->animalCode}} "
                                    @endif
                        @endforeach> 
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$tra->animalCode_id}}" disabled=disabled >
                </div>
        </div>        
        <div class="form-group">
            <label for="">Enfermedad:</label>
            <select class="form-control" id=""  name="disease"  value="{{$tra->disease}}" disabled=disabled>
                <option selected ></option>
                <option value="FALTA DE APETITO" @if($tra->disease == "FALTA DE APETITO" ) selected @endif>FALTA DE APETITO</option>
                <option value="HERIDA" @if($tra->disease == "HERIDA" ) selected @endif>HERIDA</option>
                <option value="OTRAS CAUSAS" @if($tra->disease == "OTRAS CAUSAS" ) selected @endif>OTRAS CAUSAS</option>
          </select>
        </div>
        <div class="form-group">
            <label for="">Detalle:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail" disabled=disabled >{{$tra->detail}}</textarea>
        </div>
    
        <div class="col-md-6">
            <label for=""> Antibióticos:</label>
            <select class="form-control" id=""  name="antibiotic_id"   value="{{$tra->antibiotic_id}}" disabled=disabled >
                <option selected value=""></option>
                @foreach ($anti as $i )   
                    <option value="{{$i->id}}" @if($tra->antibiotic_id == $i->id ) selected @endif>{{$i->antibiotic_d}}</option>
                @endforeach
          </select>
        </div>   
    
        <div class="col-md-6">
            <label for="">Vitamina:</label>
            <select class="form-control" id=""  name="vitamin_id"   value="{{$tra->vitamin_id}}" disabled=disabled >
                <option selected value="" ></option>
                @foreach ($vitamina as $i )   
                    <option value="{{$i->id}}" @if($tra->vitamin_id == $i->id ) selected @endif>{{$i->vitamin_d}}</option>
                @endforeach
          </select>
        </div>  
    
        <div class="form-group">
            <label for="">Tratamiento:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="treatment" disabled=disabled > {{$tra->treatment}}</textarea>
        </div>
        <div class="form-group">
                <label for="">Recuperación:</label>
                <select class="form-control" id="inputPassword4" name="recovery" value="{{$tra->recovery}}">
                    <option value="NO" @if( $tra->recovery == "NO") selected @endif>NO</option>
                    <option value="SI" @if( $tra->recovery == "SI") selected @endif>SI</option>
                </select>
                @error('date')
                        <div class="invalid-feedback">{{$message}}</div>
                @enderror
        </div>

        <div  class="form-group">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$tra->actual_state}}" >
                <option value="ACTIVO" @if( $tra->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                <option value="INACTIVO" @if( $tra->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div>
    
        <center>
                <div class="col-md-6-self-center" style="margin: 40px">
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/inactivos/fichaTratamientos')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaTratamientos') }}" >Guardar</button>
                </div>
        </center>
    </div>

    @include('layouts.base-usuario')
</form>
@endsection



