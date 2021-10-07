@extends('vitamin.base')
@section('nombre_regitro')
Editar Vitamina Inactiva
@endsection
@section('formulario')
<form action=" {{route('inactivos.Vitaminas.update',$vitamina->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre de la Vitamina:</label>
        <input type="text" class="form-control" id="vitamina_d" name="vitamin_d" value="{{$vitamina->vitamin_d}}" onblur="upperCase()" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$vitamina->date_e}}" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$vitamina->date_c}}" disabled=disabled>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$vitamina->supplier}}" onblur="upperCase()"disabled=disabled>
    </div>   
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vitamina->actual_state}}">
            <option value="ACTIVO" @if( $vitamina->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $vitamina->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>    
    <center>
            <div class="form-group" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('inactivos/Vitaminas')}}" >Cancelar</a>
                <button type="submit" class="btn btn-success btn" href="{{ Redirect::to('inactivos/Vitaminas') }}" >Actualizar</button>
            </div>
    </center>    
    @include('layouts.base-usuario')
</form>
@endsection


