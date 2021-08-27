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
                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                            
                            <input type="text" class="{{$errors->has('animalCode_id_m') ? 'is-invalid':''}}"placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="{{old('codigo_animal')}}">

                            <input type="text" placeholder="Raza"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza"  disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Edad"  id="edad"aria-label="Example text with button addon" aria-describedby="button-addon1" name="age_month" disabled=disabled  value="{{old('edad')}}">
                        
                        
                            
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
                                <label>Raza:</label>
                                <input type="text" class="form-control" id="raza2"  disabled=disabled value="{{old('raza2')}}">
                            </div>
                            <div class="col-md-3">
                                <label>Edad:</label>
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
                                    <th>Codigo Animal</th>
                                    <th>Raza</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Acción</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animalRM as $i)          
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->animalCode}}</td>
                                    <td>{{$i->race_d}}</td>
                                    <td>{{$i->age_month}}</td>
                                    <td>{{$i->sex}}</td>
                                    <td> <center> <button type="button" class="btn btn-success btn   btselect2"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></center></td>
                                    
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                        </div>
                    </div>
            

            <div  class="form-group">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
                    <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
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
@endsection