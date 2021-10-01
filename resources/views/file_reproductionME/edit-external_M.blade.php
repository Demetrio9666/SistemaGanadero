@extends('file_reproductionME.base')
@section('nombre_regitro')
Editar Reproducción Natural Externa
@endsection
@section('formulario')
<form action=" {{route('fichaReproduccionEx.update',$ext->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="desp" name="date" value="{{$ext->date}}">
        </div>
    
        <div class="form-group">
            <h5>Animal Hembra</h5>
            <br>
                <div class="input-group mb-3">
                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalEX" >Buscar</button>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animaleEX as $i)
                            @if ($ext->animalCode_id == $i->id )
                                value =" {{$i->animalCode}} "
                            @endif
                        @endforeach >
                        <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled
                        @foreach ($animaleEX as $i)
                            @if ($ext->animalCode_id == $i->id )
                                value =" {{$i->raza}} "
                            @endif
                        @endforeach >
                        
                        <input type="text" placeholder="Edad"  id="edad" name="age_month" disabled=disabled
                        @foreach ($animaleEX as $i)
                            @if ($ext->animalCode_id == $i->id )
                                value =" {{$i->age_month}} "
                            @endif
                        @endforeach  >

                        
    
                        <input type="hidden" id="idcodi" name="animalCode_id"  value="{{$ext->animalCode_id}}">
            
                          
     

                            <input type="text" placeholder="Sexo"  id="sexo" name="sex" disabled=disabled
                            @foreach ($animaleEX as $i)
                                @if ($ext->animalCode_id == $i->id )
                                    value =" {{$i->sex}} "
                                @endif
                            @endforeach >

    
                </div>
    
        </div>
        <h5>Animal Macho Externo</h5>
            <br>
        <div class="col-md-6">
            <label for="">Código Animal Externo:</label>
            <input type="text" class="form-control" id="animalCode_Exte" name="animalCode_Exte" value="{{$ext->animalCode_Exte}}" onblur="upperCase()">
        </div>
    
    
        <div class="col-md-6">
            <label for="">Raza:</label>
            <select class="form-control" id="razas" name="race_id"  value="{{$ext->race_id}}">
                    <option selected>Seleccione la Raza</option>
                @foreach ( $raza as $i )   
                    <option value="{{$i->id}}" @if($ext->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                @endforeach
            </select>
        </div>  
    
    
    
        <div class="col-md-6">
            <label for="">Edad-meses:</label>
            <input type="int" class="form-control" name="age_month" value="{{$ext->age_month}}">
        </div>  
    
    
        <div class="col-md-6">
            <label for="">Sexo</label>
            <select class="form-control" id="sex"  name="sex" value="{{$ext->sex}}">
                <option>Seleccione</option>
                
                <option value="MACHO" @if($ext->sex == "MACHO") selected @endif>MACHO</option>
            </select>
        </div>   
    
    
        <div class="col-md-6">
            <label for="">Nombre Hacienda:</label>
            <input type="text" class="form-control" id="hacienda_name" name="hacienda_name" value="{{$ext->hacienda_name}}" onblur="upperCase()">
        </div> 
        <div  class="col-md-6">
            <label for="">Estado de la Reproducción:</label>
            <select class="form-control" id="inputPassword4" name="reproduction_state" value="{{$ext->reproduction_state}}">
                <option value="ESPERA"@if($ext->reproduction_state == "ESPERA") {{'selected'}} @endif>ESPERA</option>
                <option value="EXITOSO"@if($ext->reproduction_state == "EXITOSO") {{'selected'}} @endif>EXITOSO</option>
                <option value="FALLIDO"@if($ext->reproduction_state == "FALLIDO") {{'selected'}} @endif>FALLIDO</option>
            </select>
        </div>
        <div  class="col-md-6">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state"  value="{{$ext->actual_state}}">
                <option value="ACTIVO" @if( $ext->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                <option value="INACTIVO" @if( $ext->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
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


