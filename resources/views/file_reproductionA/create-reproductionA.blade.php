@extends('file_reproductionA.base')
@section('nombre_regitro')
Registro Reproducción Artificial
@endsection
@section('formulario')
<form action="{{route('fichaReproduccionA.store')}}" method="POST">
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
                    <div class="input-group mb-3 " >
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        
                            <input type="text" class="{{$errors->has('animalCode_id_m') ? 'is-invalid':''}}" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled  value="{{old('codigo_animal')}}">
                           

                            <input type="text" placeholder="Raza"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >

                            <input type="hidden" id="idcodi" name="animalCode_id_m">
                
                        
                                <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" name="age_month" disabled=disabled  value="{{old('edad')}}">
                        
                        
                            
                                <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  value="{{old('sexo')}}">
                                @error('animalCode_id_m')
                                     <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                    </div>

            </div>

        
                        <h5>Material Genético</h5>
                        <br>
                        <div class="input-group mb-3" >
                                <input type="hidden" id="idcodi_ar" name="artificial_id" class="{{$errors->has('artificial_id') ? 'is-invalid':''}}" >
                                <div class="col-md-3">
                                        <label>Raza:</label>
                                        <input type="text" class="form-control {{$errors->has('artificial_id') ? 'is-invalid':''}}  " name="raza3" disabled=disabled id="raza3" value="{{old('raza3')}}">
                                    
                                </div>
                                <br>   
                                <div class="col-md-3">
                                        <label>Tipo de Material Genetico:</label>
                                        <input type="text" class="form-control {{$errors->has('artificial_id') ? 'is-invalid':''}}" disabled=disabled id="material3" value="{{old('material3')}}">
                                </div>
                                <br>   
                                <div class="col-md-3">
                                        <label>Nombre del Proveedor:</label>
                                        <input type="text" class="form-control {{$errors->has('artificial_id') ? 'is-invalid':''}}" disabled=disabled id="proveedor3" value="{{old('proveedor3')}}">
                                </div>
                                @error('artificial_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                     
                        </div>
                    <br>      
                    <h1></h1>
                    <br>
                
                    <div class="card"  >
                        <div class="card-body">
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th> 
                                    <th>Raza</th>
                                    <th>Tipo de Material Genetico</th>
                                    <th>Proveedor</th>
                                    <th>Acción</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arti as $i)          
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->race_d}}</td>
                                    <td>{{$i->reproduccion}}</td>
                                    <td>{{$i->supplier}}</td>
                                    <td> <button type="button" class="btn btn-success btn   btselect3"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>   
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
                    <a type="submit" class="btn btn-secondary btn"   href="{{url('/fichaReproduccionA')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{Redirect::to('/fichaReproduccionA')}}" >Guardar</button>
                </div>
            </center>
    </div>
    
</form>

@endsection