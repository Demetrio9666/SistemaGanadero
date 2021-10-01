@extends('file_animale.base')
@section('nombre_regitro')
         Editar Registro de Animales
@endsection
@section('formulario')
        <form action="{{route('fichaAnimal.update', $animal->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <center>
                <div style="margin-top: 19px; ">
                    <div class="card " style="width: 200px">
                        <div id="imagenPreview"  >
                                <img src=" {{$animal->url}}" id="imagenAct">
                        </div>
                </div>
                
                    <input class= "form-control form-control-sm {{$errors->has('file') ? 'is-invalid':''}}"  id="imagen" type="file" name="file" >      
                    @error('file')
                       <div class="invalid-feedback">{{$message}}</div>
                    @enderror 
            </center>
            <div  class="col-md-6">
                <label for="" class="form-label">Código Animal:</label>
                <input type="text" class="form-control {{$errors->has('codigo_animal') ? 'is-invalid':''}}" id="codigoAnimal" name="codigo_animal" value="{{$animal->animalCode}}" onblur="upperCase()">
                @error('codigo_animal')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div  class="col-md-6">
                <label for="">Fecha de Nacimiento:</label>
                <input type="date" class="form-control {{$errors->has('fecha_nacimiento') ? 'is-invalid':''}}" id="fecha_n" name="fecha_nacimiento"  value="{{$animal->date}}">
                @error('fecha_nacimiento')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div  class="col-md-6">
                <label for="">Raza:</label>
                <select class="form-control {{$errors->has('raza') ? 'is-invalid':''}}" id="razas" name="raza"  value="{{$animal->race_id}}">
                        <option selected></option>
                    @foreach ( $raza as $i )   
                        <option value="{{$i->id}}" @if($animal->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                    @endforeach
                </select>
                @error('raza')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div> 
            <div  class="col-md-6">
                        <label for="">Sexo:</label>
                        <select class="form-control {{$errors->has('sexo') ? 'is-invalid':''}}" id="inputPassword4" name="sexo" value="{{$animal->sex}}">
                            <option selected></option>
                            <option value="MACHO"   @if($animal->sex == "MACHO" ) selected @endif>MACHO</option>
                            <option value="HEMBRA"   @if($animal->sex == "HEMBRA" ) selected @endif>HEMBRA</option>
                        </select>
                        @error('sexo')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
            </div> 
            <div  class="col-md-6">
                <label for="">Etapa:</label>
                <select class="form-control {{$errors->has('etapa') ? 'is-invalid':''}}" id="inputPassword4" name="etapa"  value="{{$animal->stage}}" >
                    <option selected></option>
                    <option value="TERNERA" @if($animal->stage == "TERNERA") selected @endif>TERNERA</option>
                    <option value="TERNERO"   @if($animal->stage == "TERNERO" ) selected @endif>TERNERO</option>
                    <option value="VACONILLA" @if($animal->stage == "VACONILLA" ) selected @endif>VACONILLA </option>
                    <option value="VACONA"   @if($animal->stage == "VACONA" ) selected @endif>VACONA</option>
                    <option value="VACA"   @if($animal->stage == "VACA" ) selected @endif>VACA</option>
                    <option value="TORETE" @if($animal->stage == "TORETE")selected @endif >TORETE</option>
                    <option value="TORO"   @if($animal->stage == "TORO" ) selected @endif>TORO</option>
            </select>
                @error('etapa')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div  class="col-md-6">
                <label for="">Origen:</label>
                <select class="form-control {{$errors->has('origen') ? 'is-invalid':''}}" id="inputPassword4" name="origen" value="{{$animal->source}}">
                    <option selected></option>
                    <option value="NACIDO"   @if($animal->source == "NACIDO" ) selected @endif>NACIDO</option>
                    <option value="COMPRADO"   @if($animal->source == "COMPRADO" ) selected @endif>COMPRADO</option>
            </select>
            @error('origen')
                 <div class="invalid-feedback">{{$message}}</div>
            @enderror
            </div>
            <div  class="col-md-6">
                <label for="">Edad-Meses:</label>
                <input type="int" class="form-control {{$errors->has('edad') ? 'is-invalid':''}}" id="edad" name="edad" value="{{$animal->age_month}}">
                @error('edad')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div  class="col-md-6">
                <label for="">Estado de Salud:</label>
                <select class="form-control {{$errors->has('estado_de_salud') ? 'is-invalid':''}}" id="inputPassword4" name="estado_de_salud" value="{{$animal->health_condition}}">
                    <option selected></option>
                    <option value="SANO"   @if($animal->health_condition == "SANO" ) selected @endif>SANO</option>
                    <option value="ENFERMO"   @if($animal->health_condition == "ENFERMO" ) selected @endif>ENFERMO</option>
            </select>
                @error('estado_de_salud')
                    <div class="invalid-feedback">{{$message}}</div>
               @enderror
            </div>
            <div  class="col-md-6">
                <label for="">Embarazo:</label>
                <select class="form-control {{$errors->has('estado_de_gestacion') ? 'is-invalid':''}}" id="inputPassword4" name="estado_de_gestacion" value="{{$animal->gestation_state}}">
                    <option selected></option>
                    <option value="SI"  @if($animal->gestation_state == "SI" ) selected @endif>SI</option>
                    <option value="NO"  @if($animal->gestation_state == "NO" ) selected @endif>NO</option>
            </select>
                    @error('estado_de_gestacion')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>

            
            <div  class="col-md-6">
                <label for="">Ubicación:</label>
                <select class="form-control {{$errors->has('localizacion') ? 'is-invalid':''}}" id="" name="localizacion"   value="{{$animal->location_id}}">
                        <option></option>
                    @foreach ($ubicacion as $i )   
                        <option value="{{$i->id}}" @if($animal->location_id == $i->id ) selected @endif >{{$i->location_d}}</option>
                    @endforeach
                </select>
                @error('localizacion')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div> 
            <div class="col-md-6">
                <label for="">Concebedido:</label>
                <select class="form-control {{$errors->has('concebido') ? 'is-invalid':''}} " id="inputPassword4" name="concebido" value="{{$animal->conceived}}">
                    <option selected></option>
                    <option value="MONTA"   @if( $animal->conceived == "MONTA") selected @endif >MONTA</option>
                    <option value="INSIMINACIÓN ARTIFICIAL"   @if( $animal->conceived == "INSIMINACIÓN ARTIFICIAL") selected @endif>INSIMINACIÓN ARTIFICIAL</option>
                    <option value="EMBRIONAL"   @if( $animal->conceived == "EMBRIONAL") selected @endif>EMBRIONAL</option>
            </select>
                    @error('concebido')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>

            <div  class="col-md-6">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="{{$animal->actual_state}}">
                    <option value="ACTIVO" @if($animal->actual_state == "ACTIVO" ) selected @endif>ACTIVO</option>
                    <option value="VENDIDO"    @if($animal->actual_state == "VENDIDO" ) selected @endif>VENDIDO</option>
                    <option value="INACTIVO"   @if($animal->actual_state == "INACTIVO" ) selected @endif>INACTIVO</option>
                    <option value="REPRODUCCIÓN"  @if($animal->actual_state == "REPRODUCCIÓN" ) selected @endif>REPRODUCIÓN</option>
            </select>
            </div>
            <center>
                    <div class="col-md-6-self-center" style="margin: 40px">
                        
                            <a type="submit" class="btn btn-secondary "   href="{{url('/fichaAnimal')}}">Cancelar</a>
                            <button type="submit" class="btn btn-success"  style="margin: 10px" href="{{ Redirect::to('/fichaAnimal') }}" >Guardar</button>
                    </div>
            </center>
            @include('layouts.base-usuario')
                  
        </form>
      
@endsection