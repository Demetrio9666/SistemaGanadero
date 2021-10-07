@extends('file_partum.base')
@section('nombre_regitro')
         Registro de Partos 
@endsection
@section('formulario')
        <form action="{{route('fichaParto.store')}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-6">
                        
                            <label for="">Fecha de Control:</label>
                            <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha" name="date" value="{{old('date')}}" >
                            @error('date')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror 
                        
                    </div>
                
                    <div class="col-md-6">
                                <div class="input-group mb-3" style="margin: 40px">
                                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                        <input  type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="{{old('codigo_animal')}}" disabled=disabled >
                                        <input class= "{{$errors->has('animalCode_id') ? 'is-invalid':''}}" type="hidden" id="idcodi" name="animalCode_id"  value="{{old('animalCode_id')}}"  >
                                        @error('animalCode_id')
                                           <div class="invalid-feedback">{{$message}}</div>
                                        @enderror 
                                </div>
                                
                        
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Machos:</label>
                        <input type="number" class="form-control {{$errors->has('male') ? 'is-invalid':''}}" id="cantidadMacho" onChange="cantidadM(this.value)" name="male" value="{{old('male')}}">
                        @error('male')
                        <div class="invalid-feedback">{{$message}}</div>
                     @enderror 
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Hembras:</label>
                        <input type="number" class="form-control {{$errors->has('female') ? 'is-invalid':''}}" id="cantidadHembra" onChange="cantidadH(this.value)" name="female" value="{{old('female')}}">
                        @error('female')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror 
                    </div>
                    <div class="col-md-6">
                        <label for="">Cant.Muertos:</label>
                        <input type="number" class="form-control {{$errors->has('dead') ? 'is-invalid':''}}" id="cantidadMuertos" onChange="cantidadMU(this.value)" name="dead" value="{{old('dead')}}" >
                        @error('dead')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror 
                    </div>
                    <div class="col-md-6">
                        <label for="">Estado de la Madre:</label>
                        <select class="form-control {{$errors->has('mother_status') ? 'is-invalid':''}}"  name="mother_status" value="{{old('mother_status')}}">
                            <option selected></option>
                            <option value="VIVA" @if(old('mother_status') == "VIVA") {{'selected'}} @endif>VIVA</option>
                            <option value="MUERTA" @if(old('mother_status') == "MUERTA") {{'selected'}} @endif>MUERTA</option>
                    </select>
                    @error('mother_status')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror 
                    </div>
                    <div class="col-md-6">
                        <label for="">Tipo de Parto:</label>
                        <select class="form-control {{$errors->has('partum_type') ? 'is-invalid':''}}"  name="partum_type" value="{{old('partum_type')}}">
                            <option selected></option>
                            <option value="NATURAL" @if(old('partum_type') == "NATURAL") {{'selected'}} @endif>NATURAL</option>
                            <option value="CESÁREA" @if(old('partum_type') == "CESÁREA") {{'selected'}} @endif>CESÁREA</option>
                    </select>
                    @error('partum_type')
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
                        <div class="col-md-6" style="margin: 40px">
                                <a type="submit" class="btn btn-secondary "   href="{{url('/fichaParto')}}">Cancelar</a>
                                <button type="submit" class="btn btn-success "  style="margin: 10px" href="{{ Redirect::to('/fichaParto') }}" >Guardar</button>
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
</script>

@endsection