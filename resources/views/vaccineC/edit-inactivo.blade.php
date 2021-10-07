@extends('vaccineC.base')
@section('nombre_regitro')
Editar Control de Vacunación
@endsection
@section('formulario')
<form action="{{route('inactivos.controlVacunas.update',$vacunaC->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Vacunación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{$vacunaC->date}}" disabled=disabled>
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 33px">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" disabled=disabled>Buscar</button>
                        <span class="input-group-text" id="basic-addon1">Codigo</span>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animal as $i)
                                    @if ($vacunaC->animalCode_id == $i->id )
                                         value =" {{$i->animalCode}} "
                                    @endif
                        @endforeach>
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$vacunaC->animalCode_id}}">
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Vacuna:</label>
            <select class="form-control" id="inputPassword4"  name="vaccine_id"   value="{{$vacunaC->vaccine_id}}" disabled=disabled>
                <option selected></option>
                @foreach ($vacuna as $i )   
                    <option value="{{$i->id}}" @if($vacunaC->vaccine_id == $i->id ) selected @endif>{{$i->vaccine_d}}</option>
                    
                @endforeach
          </select>
        </div>  
        <div  class="col-md-6">
            <label for="">Fecha de próxima dosis:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$vacunaC->date_r}}" disabled=disabled>
        </div>
        <div  class="col-md-6">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vacunaC->actual_state}}">
                <option value="ACTIVO" @if( $vacunaC->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                <option value="INACTIVO" @if( $vacunaC->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div  class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('inactivos/controlVacunas')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('inactivos/controlVacunas') }}" >Guardar</button>
            </div>
        </center>
       

    </div>
    @include('layouts.base-usuario')
</form>
@endsection
