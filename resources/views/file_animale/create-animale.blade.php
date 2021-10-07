@extends('file_animale.base')
@section('nombre_regitro')
         Registro de Animales
         
@endsection
@section('formulario')
            <form action="{{route('fichaAnimal.store')}}" method="POST" class="row g-3" enctype="multipart/form-data"  id="quickForm" >                                                     
                @csrf
                    <center>
                        <div style="margin-top: 19px; ">
                            <div class="card " style="width: 200px">
                                <div id="imagenPreview"  ></div>
                            </div>
                        </div>
                            <input class="form-control form-control-sm {{$errors->has('file') ? 'is-invalid':''}}" id="imagen" type="file" name="file" >
                            
                            @error('file')
                               <div class="invalid-feedback">{{$message}}</div>
                            @enderror        
                    </center>
                    
                    <div  class="col-md-6">
                        <label for="" class="form-label">Código Animal:</label>
                        <input type="text" class="form-control {{$errors->has('codigo_animal') ? 'is-invalid':''}}" id="codigoAnimal" name="codigo_animal" value="{{old('codigo_animal')}}" onblur="upperCase()">
                      
                        @error('codigo_animal')
                             <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                            
                    <div  class="col-md-6">
                        <label for="">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control {{$errors->has('fecha_nacimiento') ? 'is-invalid':''}}" id="fecha_n" name="fecha_nacimiento"  value="{{old('fecha_nacimiento')}}">
                        @error('fecha_nacimiento')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>


                    <div  class="col-md-6">
                        <label for="">Raza:</label>
                        <select class="form-control {{$errors->has('raza') ? 'is-invalid':''}}" id="razas" name="raza"   value="{{old('raza')}}">
                                <option selected>  </option>
                            @foreach ( $raza as $i )   
                                <option value="{{$i->id}}" @if(old('raza') == $i->id) {{'selected'}} @endif >{{$i->race_d}}</option>
                            @endforeach
                        </select>
                        @error('raza')
                              <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>  
                    <div  class="col-md-6">
                        <label for="">Sexo:</label>
                        <select class="form-control {{$errors->has('sexo') ? 'is-invalid':''}}" id="opsexo" name="sexo"  value="{{old('sexo')}}" onChange="mostrar(this.value)"   >
                            <option selected></option>
                            <option id ="MACHO" value="MACHO"  @if(old('sexo') == "MACHO") {{'selected'}} @endif>MACHO</option>
                            <option id="HEMBRA" value="HEMBRA" @if(old('sexo') == "HEMBRA") {{'selected'}} @endif>HEMBRA</option>
                         </select>
                         @error('sexo')
                               <div class="invalid-feedback">{{$message}}</div>
                         @enderror

                    </div> 
                    <div  class="col-md-6">
                        <label for="">Etapa de vida:</label>
                        <select class="form-control {{$errors->has('etapa') ? 'is-invalid':''}}" id="opetapa" name="etapa"  value="{{old('etapa')}}" onChange="validarEdadyEtapa(this.value)" >
                            <option  selected ></option>
                            <option id ="TH" value="TERNERA" @if(old('etapa') == "TERNERA") {{'selected'}}@endif style="display: none;">TERNERA</option>
                            <option id ="TM" value="TERNERO" @if(old('etapa') == "TERNERO") {{'selected'}}@endif style="display: none;">TERNERO</option>
                            <option id ="VA" value="VACONILLA"@if(old('etapa') == "VACONILLA") {{'selected'}}@endif style="display: none;">VACONILLA</option>
                            <option  id ="VACO" value="VACONA"@if(old('etapa') == "VACONA") {{'selected'}}@endif style="display: none;">VACONA</option>
                            <option  id ="V" value="VACA" @if(old('etapa') == "VACA") {{'selected'}} @endif style="display: none;">VACA</option>
                            <option id="TORE" value="TORETE"@if(old('etapa') == "TORETE") {{'selected'}}@endif style="display: none;">TORETE</option>
                            <option id ="TO"value="TORO" @if(old('etapa') == "TORO") {{'selected'}} @endif style="display: none;" >TORO</option>
                        </select>
                        @error('etapa')
                             <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div  class="col-md-6">
                        <label for="">Origen:</label>
                        <select class="form-control {{$errors->has('origen') ? 'is-invalid':''}}" id="origen" name="origen"  value="{{old('origen')}}">
                            <option selected></option>
                            <option value="NACIDO"@if(old('origen') == "NACIDO") {{'selected'}}@endif>NACIDO</option>
                            <option value="COMPRADO"@if(old('origen') == "COMPRADO") {{'selected'}}@endif>COMPRADO</option>
                    </select>
                    @error('origen')
                          <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    
                    <div  class="col-md-6">
                        <label for="">Edad-Meses:</label>
                        <input type="int" class="form-control {{$errors->has('edad') ? 'is-invalid':''}}" id="edad" name="edad"  value="{{old('edad')}}" onChange="ValidarEdad(this.value)" Disabled=disabled >
                        @error('edad')
                           <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div  class="col-md-6">
                        <label for="">Estado de Salud:</label>
                        <select class="form-control {{$errors->has('estado_de_salud') ? 'is-invalid':''}}" id="salud" name="estado_de_salud"  value="{{old('estado_de_salud')}}">
                            <option selected></option>
                            <option value="SANO"@if(old('estado_de_salud') == "SANO") {{'selected'}}@endif>SANO</option>
                            <option value="ENFERMO"@if(old('estado_de_salud') == "ENFERMO") {{'selected'}}@endif>ENFERMO</option>
                        </select>
                        @error('estado_de_salud')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div  class="col-md-6">
                        <label for="">Embarazo:</label>
                        <select class="form-control {{$errors->has('estado_de_gestacion') ? 'is-invalid':''}}" id="embarazo" name="estado_de_gestacion"  value="{{old('estado_de_gestacion')}}" onChange="validarEmbarazo(this.value)">
                            <option selected></option>
                            <option id="SI" value="SI"@if(old('estado_de_gestacion') == "SI") {{'selected'}}@endif style="display: none;">SI</option>
                            <option id="NO" value="NO"@if(old('estado_de_gestacion') == "NO") {{'selected'}}@endif style="display: none;">NO</option>
                        </select>
                        @error('estado_de_gestacion')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div  class="col-md-6">
                        <label for="">Ubicacion:</label>
                        <select class="form-control {{$errors->has('localizacion') ? 'is-invalid':''}}" id="ubicacion" name="localizacion" value="{{old('localizacion')}}">
                                <option selected>  </option>
                            @foreach ($ubicacion as $i )   
                                <option value="{{$i->id}}" @if(old('localizacion') == $i->id) {{'selected'}} @endif >{{$i->location_d}}</option>
                            @endforeach
                        </select>
                        @error('localizacion')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div> 
                    
                    <div class="col-md-6">
                        <label for="">Concebedido o creado:</label>
                        <select class="form-control {{$errors->has('concebido') ? 'is-invalid':''}}" id="concedido" name="concebido" value="{{old('concebido')}}">
                            <option selected></option>
                            <option value="MONTA"@if(old('concebido') == "MONTA") {{'selected'}} @endif>MONTA</option>
                            <option value="INSIMINACIÓN ARTIFICIAL"@if(old('concebido') == "INSIMINACIÓN ARTIFICIAL") {{'selected'}} @endif>INSIMINACIÓN ARTIFICIAL</option>
                            <option value="EMBRIONAL" @if(old('concebido') == "EMBRIONAL") {{'selected'}} @endif>EMBRIONAL</option>
                       </select>
                    @error('concebido')
                       <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>

                    <div  class="col-md-6">
                        <label for="">Estado Actual:</label>
                        <select class="form-control " id="estado" name="actual_state" value="{{old('actual_state')}}">
                            <option id="ACTIVO" value="ACTIVO"@if(old('actual_state') == "ACTIVO") {{'selected'}} @endif style="display: none;">ACTIVO</option>
                            <option id="VENDIDO" value="VENDIDO"@if(old('actual_state') == "VENDIDO") {{'selected'}} @endif style="display: none;">VENDIDO</option>
                            <option id="REPRODUCCIÓN" value="REPRODUCCIÓN"@if(old('actual_state') == "REPRODUCCIÓN") {{'selected'}} @endif style="display: none;">REPRODUCCIÓN</option>
                            <option id="INACTIVO" value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif style="display: none;">INACTIVO</option>
                       </select>
                       
                    
                    @error('actual_state')
                         <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <center>
                        <div class="col-md-6" style="margin: 40px">
                        
                            <a type="button"  class="btn btn-secondary "   href="{{url('/fichaAnimal')}}">Cancelar</a>
                            <button type="sutmit" id="btguardar" class="btn btn-success "  style="margin: 10px" href="{{ Redirect::to('/fichaAnimal') }}" >Guardar</button>

                        </div>

                    </center>
                    @include('layouts.base-usuario')
                   
            </form>

@endsection