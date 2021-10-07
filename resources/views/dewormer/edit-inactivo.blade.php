@extends('dewormer.base')
@section('nombre_regitro')
Editar Desparacitante Inactiva
@endsection
@section('formulario')
<form action=" {{route('inactivos.Desparasitantes.update',$desp->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre del Desparasitante:</label>
        <input type="text" class="form-control" id="dewormer_d" name="dewormer_d" value="{{$desp->dewormer_d}}" onblur="upperCase()"disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$desp->date_e}}"disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$desp->date_c}}"disabled=disabled >
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$desp->supplier}}" onblur="upperCase()" disabled=disabled>
    </div>    
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$desp->actual_state}}">
            <option value="ACTIVO" @if( $desp->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $desp->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>       
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/inactivos/Desparasitantes')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn" href="{{ Redirect::to('/inactivos/Desparasitantes') }}" >Guardar</button>
        </div>
    </center>
    @include('layouts.base-usuario')
</form>
@endsection