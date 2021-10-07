@extends('dewormerC.base')
@section('nombre_regitro')
Editar Control de Desparasitación Inactivo
@endsection
@section('formulario')
<form action="{{route('inactivos.controlDesparasitaciones.update',$desC->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{$desC->date}}" disabled=disabled>
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-outline-secondary" disabled=disabled type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animal as $i)
                                    @if ($desC->animalCode_id == $i->id )
                                         value =" {{$i->animalCode}} "
                                    @endif
                        @endforeach>
                       
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$desC->animalCode_id}}">
                        
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Desparasitante:</label>
            <select class="form-control" id="inputPassword4"  name="deworming_id"   value="{{$desC->deworming_id}}" disabled=disabled>
                <option selected></option>
                @foreach ($des as $i )   
                    <option value="{{$i->id}}" @if($desC->deworming_id == $i->id ) selected @endif>{{$i->dewormer_d}}</option>       
                @endforeach
          </select>
        </div>  
    
        <div class="col-md-6">
            <label for="">Fecha de próxima dosis:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$desC->date_r}}" disabled=disabled>
        </div>
        <div  class="form-group">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$desC->actual_state}}">
                <option value="ACTIVO" @if( $desC->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                <option value="INACTIVO" @if( $desC->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('/inactivos/controlDesparasitaciones')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn" href="{{ Redirect::to('inactivos/controlDesparasitaciones') }}" >Guardar</button>
            </div>
        </center> 
       
    </div>
    @include('layouts.base-usuario')
</form>
@endsection
