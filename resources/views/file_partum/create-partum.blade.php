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
                            <input type="date" class="form-control" id="fecha_r" name="date" value="{{old('date')}}" >
                        
                    </div>
                
                    <div class="col-md-6">
                                <div class="input-group mb-3" style="margin: 40px">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" name="codigo_animal" value="{{old('codigo_animal')}}" disabled=disabled >
                                        <input type="hidden" id="idcodi" name="animalCode_id"  value="{{old('animalCode_id')}}"  >
                                </div>
                        
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Machos:</label>
                        <input type="number" class="form-control" id="fecha_r" name="male" value="{{old('male')}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Cant.Hembras:</label>
                        <input type="number" class="form-control" id="fecha_r" name="female" value="{{old('female')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Cant.Muertos:</label>
                        <input type="number" class="form-control" id="fecha_r" name="dead" value="{{old('dead')}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Estado de la Madre:</label>
                        <select class="form-control" id="inputPassword4" name="mother_status" value="{{old('mother_status')}}">
                            <option selected></option>
                            <option value="VIVA" @if(old('mother_status') == "VIVA") {{'selected'}} @endif>VIVA</option>
                            <option value="MUERTA" @if(old('mother_status') == "MUERTA") {{'selected'}} @endif>MUERTA</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tipo de Parto:</label>
                        <select class="form-control" id="inputPassword4" name="partum_type" value="{{old('partum_type')}}">
                            <option selected></option>
                            <option value="NATURAL" @if(old('partum_type') == "NATURAL") {{'selected'}} @endif>NATURAL</option>
                            <option value="CESÁREA" @if(old('partum_type') == "CESÁREA") {{'selected'}} @endif>CESÁREA</option>
                    </select>
                    </div>
                    <div  class="col-md-6">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                            <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
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
        </form>

@endsection