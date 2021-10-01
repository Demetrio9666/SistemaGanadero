@extends('file_reproductionM.base')
@section('nombre_regitro')
Registro de Reproducción Natural
@endsection
@section('formulario')
<form action="{{route('fichaReproduccionM.store')}}" method="POST">
    @csrf
    <div class="row">
            <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid':''}}" id="fecha_r" name="date" >
                @error('date')
                <div class="invalid-feedback">{{$message}}</div>
                 @enderror
            </div>
            <br>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimalhembra" >Buscar</button>
                            
                            <input type="text" class="{{$errors->has('animalCode_id_m') ? 'is-invalid':''}}"placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="{{old('codigo_animal')}}">

                            <input type="text" placeholder="Edad"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza"  disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Raza"  id="edad"aria-label="Example text with button addon" aria-describedby="button-addon1" name="age_month" disabled=disabled  value="{{old('edad')}}">
                        
                        
                            
                                <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  value="{{old('sexo')}}">
                                @error('animalCode_id_m')
                                <div class="invalid-feedback">{{$message}}</div>
                                 @enderror
                    </div>

            </div>

            
                <h5>Animal Macho</h5>
                <br>
                    
                            <input type="hidden" id="idcodi2" class="{{$errors->has('animalCode_id_p') ? 'is-invalid':''}}" name="animalCode_id_p" value="{{old('idcodi2')}}">
                            <div class="col-md-3">
                                <label>Codigo Animal:</label>
                                <input type="text" class="form-control" id="codigo_animal2"  disabled=disabled value="{{old('codigo_animal2')}}">
                            </div>
                            <div class="col-md-3">
                                <label>Edad:</label>
                                <input type="text" class="form-control" id="raza2"  disabled=disabled value="{{old('raza2')}}">
                            </div>
                            <div class="col-md-3">
                                <label>Raza:</label>
                                <input type="text" class="form-control" id="edad2" name="age_month" disabled=disabled value="{{old('edad2')}}">
                            </div>
                            <div class="col-md-3">
                                <label >Sexo:</label>
                                <input type="text" class="form-control" id="sexo2" name="sex" disabled=disabled value="{{old('sexo2')}}">
                            </div>
                            @error('animalCode_id_p')
                                   <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                            <br>      
                            <h1></h1>
                            <br>
                    <div class="card">
                        <div class="card-body">
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código Animal</th>
                                    <th>Edad</th>
                                    <th>Raza</th>
                                    <th>Sexo</th> 
                                    <th>Acción</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animalmacho as $i)          
                                <tr>
                                    <td class="col1">{{$i->id}}</td>
                                    <td class="col2">{{$i->animalCode}}</td>
                                    <td class="col3">{{$i->age_month}}</td>
                                    <td class="col4">{{$i->raza}}</td>
                                    <td class="col5">{{$i->sex}}</td>
                                    <td> <center> <button type="button" class="btn btn-success btn   btselectMacho"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></center></td>
                                    
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                        </div>
                    </div>
            
            <div  class="form-group">
                <label for="">Estado de la Reproducción:</label>
                <select class="form-control" id="inputPassword4" name="reproduction_state" value="{{old('reproduction_state')}}">
                    <option value="ESPERA"@if(old('reproduction_state') == "ESPERA") {{'selected'}} @endif>ESPERA</option>
                    <option value="EXITOSO"@if(old('reproduction_state') == "EXITOSO") {{'selected'}} @endif>EXITOSO</option>
                    <option value="FALLIDO"@if(old('reproduction_state') == "FALLIDO") {{'selected'}} @endif>FALLIDO</option>
                </select>
            </div>

            <div  class="form-group">
                <label for="">Estado actual de la Información:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                    <option value="ACTIVO"@if(old('actual_state') == "ACTIVO") {{'selected'}} @endif>ACTIVO</option>
                    <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
                </select>
            </div>

            
            <center>
                <div class="col-md-8-self-center" style="margin: 40px" >
                    <a type="submit" class="btn btn-secondary btn"   href="{{url('/fichaReproduccionM')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/fichaReproduccionM') }}" >Guardar</button>
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
              document.getElementById('fecha_r').value=ano+"-"+mes+"-"+dia;
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
            document.getElementById("fecha_r").setAttribute("max", today);
  </script>
@endsection