@extends('antibiotic.base')
@section('nombre_regitro')
Editar Antibiótico
@endsection
@section('formulario')
<form action=" {{route('confAnt.update',$anti->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nombre del Antibiótico:</label>
        <input type="text" class="form-control" id="antibiotic_d" name="antibiotic_d" value="{{$anti->antibiotic_d}}" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$anti->date_e}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$anti->date_c}}" >
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$anti->supplier}}" onblur="upperCase()" >
    </div>   
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$anti->actual_state}}">
            <option selected></option>
            <option value="ACTIVO" @if($anti->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if($anti->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div>   
    <center>
        <div class="form-group">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confAnt')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confAnt') }}" >Actualizar</button>
        </div>
    </center>     
    @include('layouts.base-usuario')
</form>

@endsection

























