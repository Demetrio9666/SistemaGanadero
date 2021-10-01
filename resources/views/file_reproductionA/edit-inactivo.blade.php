@extends('file_reproductionA.base')
@section('nombre_regitro')
Editar Reproducción Artificial
@endsection
@section('formulario')
<form action="{{route('inactivos.fichaReproduccionA.update', $re->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-md-6">
        <label for="">Fecha de Registro:</label>
        <input type="date" class="form-control" id="fecha_r" name="date" value="{{$re->date}}"  disabled=disabled>
    </div>
    <br>
    <div class="form-group">
        <h1>Animal</h1>
        <br>
            <div class="input-group mb-3">
                    <input type="hidden" id="idcodi" name="animalCode_id_m"  value="{{$re->animalCode_id_m}}">

                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" disabled=disabled>Buscar</button>
                    
                    <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                    @foreach ($animalhembra as $i)
                            @if ($re->animalCode_id_m == $i->id )
                                value =" {{$i->animalCode}} "
                            @endif
                    @endforeach >

                    <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1" id="edad" name="age_month" disabled=disabled 
                    @foreach ($animalhembra as $i)
                            @if ($re->animalCode_id_m == $i->id )
                                value =" {{$i->age_month}} "
                            @endif
                    @endforeach>

                    
                    <input type="text" placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                    @foreach ($animalhembra as $i)
                            @if ($re->animalCode_id_m == $i->id )
                                value =" {{$i->raza}} "
                            @endif
                    @endforeach >
                   
                        <input type="text"  placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  
                        @foreach ($animalhembra as $i)
                                @if ($re->animalCode_id_m == $i->id )
                                    value =" {{$i->sex}} "
                                @endif
                        @endforeach>
                    
            </div>

    </div>
                    <h1>Material Genético</h1>
                    <br>
                    <input type="hidden" id="idcodi_ar" name="artificial_id"    value="{{$re->artificial_id}}">
                    <div class="col-md-3">
                            <label>Raza:</label>
                            <input type="text" class="form-control" disabled=disabled id="raza3" 
                            @foreach ($arti as $i)
                                    @if ($re->artificial_id == $i->id )
                                        value =" {{$i->race_d}} "
                                    @endif
                             @endforeach >
                    </div>
                    <br>   
                    <div class="col-md-3">
                            <label>Tipo de Material Genetico:</label>
                            <input type="text" class="form-control" disabled=disabled id="material3" 
                            @foreach ($arti as $i)
                                    @if ($re->artificial_id == $i->id )
                                        value =" {{$i->reproduccion}} "
                                    @endif
                            @endforeach>
                    </div>
                    <br>   
                    <div class="col-md-3">
                            <label>Nombre del Proveedor:</label>
                            <input type="text" class="form-control" disabled=disabled id="proveedor3" 
                            @foreach ($arti as $i)
                                    @if ($re->artificial_id == $i->id )
                                        value =" {{$i->supplier}} "
                                    @endif
                            @endforeach >
                    </div>
            <br>      
            <h1></h1>
            <br>
            <div class="card">
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
                              <center>
                                <td> <button type="button" class="btn btn-success btn btselect3"  data-dismiss="modal" disabled=disabled><i class="fas fa-check-circle"></i></button></td>
                              </center>
                              
                            </tr>
                          @endforeach        
                    </tbody>
                </table>
                </div>
            </div>         

    </div>
    <div  class="form-group">
        <label for="">Estado de la Reproducción:</label>
        <select class="form-control" id="inputPassword4" name="reproduction_state" value="{{$re->reproduction_state}}" disabled=disabled>
            <option value="ESPERA"@if($re->reproduction_state == "ESPERA") {{'selected'}} @endif>ESPERA</option>
            <option value="EXITOSO"@if($re->reproduction_state == "EXITOSO") {{'selected'}} @endif>EXITOSO</option>
            <option value="FALLIDO"@if($re->reproduction_state == "FALLIDO") {{'selected'}} @endif>FALLIDO</option>
        </select>
    </div>
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$re->actual_state}}">
            <option value="ACTIVO" @if( $re->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $re->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>


    <center>
        <div class="col-md-8-self-center" style="margin: 40px" >
            <a type="submit" class="btn btn-secondary btn"   href="{{url('/inactivos/fichaReproduccionA')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaReproduccionA') }}" >Guardar</button>
        </div>
    </center>
    
</div>
@include('layouts.base-usuario')
</form>
@endsection
