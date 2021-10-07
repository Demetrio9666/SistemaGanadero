@extends('file_partum.base')
@section('nombre_regitro')
        Editar Registro de Partos Inactivos 
@endsection
@section('formulario')
            <form action="{{route('inactivos.fichaPartos.update',$par->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                            <div class="col-md-6">
                                <label for="">Fecha de Control:</label>
                                <input type="date" class="form-control" id="fecha_r" name="date" value="{{$par->date}}" disabled=disabled>
                            </div>
                            <div class="col-md-6">
                                    <div class="input-group mb-3" style="margin: 40px">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" disabled=disabled>Buscar</button>
                                            <input type="text" aria-label="Example text with button addon" aria-describedby="button-addon1" name="codigo_animal" id="codigo_animal" disabled=disabled 
                                            
                                                       @foreach ($animal as $i)
                                                                    @if ($par->animalCode_id == $i->id )
                                                                        value =" {{$i->animalCode}} "
                                                                    @endif
                                                        @endforeach> 
                                            <input type="hidden" id="idcodi" name="animalCode_id" value="{{$par->animalCode_id}}">
                                    </div>
                            </div>        
                            <div class="col-md-6">
                                <label for="">Cant.Machos:</label>
                                <input type="number" class="form-control" id="fecha_r" name="male" value="{{$par->male}}" disabled=disabled>
                            </div>

                            <div class="col-md-6">
                                <label for="">Cant.Hembras:</label>
                                <input type="number" class="form-control" id="fecha_r" name="female" value="{{$par->female}}" disabled=disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Cant.Muertos:</label>
                                <input type="number" class="form-control" id="fecha_r" name="dead" value="{{$par->dead}}" disabled=disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Estado de la Madre:</label>
                                <select class="form-control" id="inputPassword4" name="mother_status" value="{{$par->mother_status}}" disabled=disabled>
                                    <option selected></option>
                                    <option value="VIVA"  @if($par->mother_status == "VIVA" ) selected @endif >VIVA</option>
                                    <option value="MUERTA" @if($par->mother_status == "MUERTA" ) selected @endif  >MUERTA</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tipo de Parto:</label>
                                <select class="form-control" id="inputPassword4" name="partum_type" value="{{$par->partum_type}}" disabled=disabled>
                                    <option selected></option>
                                    <option value="NATURAL"  @if($par->partum_type == "NATURAL" ) selected @endif  >NATURAL</option>
                                    <option value="CESÁREA"  @if($par->partum_type == "CESÁREA" ) selected @endif >CESÁREA</option>
                            </select>
                            </div>
                            <div  class="col-md-6">
                                <label for="">Estado actual de la Información:</label>
                                <select class="form-control" id="inputPassword4" name="actual_state" value="{{$par->actual_state}}">
                                    <option value="ACTIVO" @if( $par->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                                    <option value="INACTIVO" @if( $par->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                                </select>
                            </div> 
                            <center>
                                <div class="col-md-6" style="margin: 40px">
                                    <a type="submit" class="btn btn-secondary "   href="{{url('/inactivos/fichaPartos')}}">Cancelar</a>
                                    <button type="submit" class="btn btn-success "  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaPartos') }}" >Guardar</button>
                                </div>
                            </center>
                            @include('layouts.base-usuario')
                           
                        </form>
                    </div>
@endsection