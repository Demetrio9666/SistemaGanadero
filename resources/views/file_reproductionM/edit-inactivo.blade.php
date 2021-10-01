@extends('file_reproductionM.base')
@section('nombre_regitro')
Editar de Reproducción Natural
@endsection
@section('formulario')
<form action="{{route('inactivos.fichaReproduccionM.update', $re->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
             <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control" id="fecha_r" name="date" value="{{$re->date}}" disabled=disabled>
            </div>
            <br>
            <div class="form-group">
                <h5>Animal Hembra</h5>
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

                         
                            <input type="text"  placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                            @foreach ($animalhembra as $i)
                                    @if ($re->animalCode_id_m == $i->id )
                                        value =" {{$i->raza}} "
                                    @endif
                            @endforeach >

                              
                                <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="edad" name="age_month" disabled=disabled 
                                @foreach ($animalhembra as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->age_month}} "
                                        @endif
                                @endforeach>
                         
                          
                              
                                <input type="text" placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  
                                @foreach ($animalhembra as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->sex}} "
                                        @endif
                                @endforeach>
                    </div>
            </div>                
            <h5>Animal Macho</h5>
            <br>
                    <div class="input-group mb-3">
                            <input type="hidden" id="idcodi2" name="animalCode_id_p"    value="{{$re->animalCode_id_p}}">
                            
                            <div  class="col-md-6">
                                <label>Codigo Animal:</label>
                                <input type="text" class="form-control" name="codigo_animal2" id="codigo_animal2"  disabled=disabled 
                                @foreach ($animalmacho as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->animalCode}} "
                                        @endif
                                @endforeach >
                            </div>
                            <div  class="col-md-6">
                                <label>Raza:</label>
                                <input type="text" class="form-control" name ="raza2" id="raza2"  disabled=disabled 
                                @foreach ($animalmacho as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->raza}} "
                                        @endif
                                @endforeach >
                            </div>


                            <div  class="col-md-6">
                                <label>Edad:</label>
                                <input type="text" class="form-control" id="edad2" name="age_month"  name="age_month" disabled=disabled  
                                @foreach ($animalmacho as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->age_month}} "
                                        @endif
                                @endforeach  >
                            </div>
                            <div  class="col-md-6">
                                <label >Sexo:</label>
                                <input type="text" class="form-control" id="sexo2" name="sexo2" disabled=disabled 
                                @foreach ($animalmacho as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->sex}} "
                                        @endif
                                @endforeach>
                            </div>
                    </div>
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
                                    <td> <center> <button type="button" class="btn btn-success btn   btselectMacho"  data-dismiss="modal" disabled=disabled><i class="fas fa-check-circle"  ></i></button></center></td>
                                    
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
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
                    <option value="ACTIVO"  @if( $re->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                    <option value="INACTIVO" @if( $re->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                </select>
            </div>
            <center>
                <div class="col-md-8-self-center" style="margin: 40px" >
                    <a type="submit" class="btn btn-secondary btn"   href="{{url('/inactivos/fichaReproduccionM')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaReproduccionM') }}" >Guardar</button>
                </div>
            </center>
    </div>
    @include('layouts.base-usuario')
</form>

@endsection
