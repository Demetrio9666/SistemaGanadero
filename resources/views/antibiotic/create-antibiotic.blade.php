@extends('antibiotic.base')
@section('nombre_regitro')
         Registro Antibiótico
@endsection
@section('formulario')
<form action="{{route('confAnt.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre del Antibiótico:</label>
        <input type="text" class="form-control" id="antibiotic_d" name="antibiotic_d"  value="{{old('antibiotic_d')}}" onblur="upperCase()">
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
            <option value="DISPONIBLE">DISPONIBLE</option>
            <option value="INACTIVO">INACTIVO</option>
         </select>
    </div>  
    <center>
        <div class="form-group"style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confAnt')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confAnt') }}" >Guardar</button>
        </div>
    </center>   
   
</form>
@endsection


















