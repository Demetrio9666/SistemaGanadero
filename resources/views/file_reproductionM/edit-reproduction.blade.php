@extends('file_reproductionM.base')
@section('nombre_regitro')
Editar de Reproducción Natural
@endsection
@section('formulario')
<form action="{{route('fichaReproduccionM.update', $re->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
             <div class="col-md-6">
                <label for="">Fecha de Registro:</label>
                <input type="date" class="form-control" id="fecha_r" name="date" value="{{$re->date}}">
            </div>
            <br>
            <div class="form-group">
                <h5>Animal Hembra</h5>
                <br>
                    <div class="input-group mb-3">
                            <input type="hidden" id="idcodi" name="animalCode_id_m"  value="{{$re->animalCode_id_m}}">

                            <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                            
                            <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                            @foreach ($animalRH as $i)
                                    @if ($re->animalCode_id_m == $i->id )
                                        value =" {{$i->animalCode}} "
                                    @endif
                            @endforeach >

                         
                            <input type="text"  placeholder="Raza" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                            @foreach ($animalRH as $i)
                                    @if ($re->animalCode_id_m == $i->id )
                                        value =" {{$i->race_d}} "
                                    @endif
                            @endforeach >

                              
                                <input type="text" placeholder="Edad" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="edad" name="age_month" disabled=disabled 
                                @foreach ($animalRH as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->age_month}} "
                                        @endif
                                @endforeach>
                         
                          
                              
                                <input type="text" placeholder="Sexo" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sexo" name="sex" disabled=disabled  
                                @foreach ($animalRH as $i)
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
                                @foreach ($animalRM as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->animalCode}} "
                                        @endif
                                @endforeach >
                            </div>
                            <div  class="col-md-6">
                                <label>Raza:</label>
                                <input type="text" class="form-control" name ="raza2" id="raza2"  disabled=disabled 
                                @foreach ($animalRM as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->race_d}} "
                                        @endif
                                @endforeach >
                            </div>


                            <div  class="col-md-6">
                                <label>Edad:</label>
                                <input type="text" class="form-control" id="edad2" name="age_month"  name="age_month" disabled=disabled  
                                @foreach ($animalRM as $i)
                                        @if ($re->animalCode_id_p == $i->id )
                                            value =" {{$i->age_month}} "
                                        @endif
                                @endforeach  >
                            </div>
                            <div  class="col-md-6">
                                <label >Sexo:</label>
                                <input type="text" class="form-control" id="sexo2" name="sexo2" disabled=disabled 
                                @foreach ($animalRM as $i)
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
                                    <td> <button type="button" class="btn btn-success btn   btselect2"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>
                                    
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                        </div>
                    </div>       
            
            <div  class="form-group">
                <label for="">Estado Actual:</label>
                <select class="form-control" id="inputPassword4" name="actual_state" value="{{$re->actual_state}}">
                    <option value="DISPONIBLE"  @if( $re->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                    <option value="INACTIVO" @if( $re->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
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
 
 
