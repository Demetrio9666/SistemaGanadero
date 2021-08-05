@extends('vitamin.base')
@section('nombre_regitro')
         Registro Vitaminas
@endsection
@section('formulario')
<form action="{{route('confVi.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre de la Vitamina:</label>
        <input type="text" class="form-control" id="vitamina_d" name="vitamin_d" value="{{old('vitamin_d')}}" onblur="upperCase()">
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{old('date_e')}}">
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{old('date_c')}}">
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="{{old('supplier')}}" onblur="upperCase()">
    </div>   
    <div  class="form-group">
        <label for="">Estado Actual:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
            <option value="DISPONIBLE"@if(old('actual_state') == "DISPONIBLE") {{'selected'}} @endif>DISPONIBLE</option>
            <option value="INACTIVO"@if(old('actual_state') == "INACTIVO") {{'selected'}} @endif>INACTIVO</option>
         </select>
    </div>  
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confVi')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confVi') }}" >Guardar</button>
        </div>
    </center>  
    
</form>
@endsection

