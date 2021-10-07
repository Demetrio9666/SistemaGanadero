@extends('antibiotic.base')
@section('nombre_regitro')
         Registro Antibiótico
@endsection
@section('formulario')
<form action="{{route('confAnt.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre del Antibiótico:</label>
        <input type="text" class="form-control {{$errors->has('antibiotic_d') ? 'is-invalid':''}}" id="antibiotic_d" name="antibiotic_d"  value="{{old('antibiotic_d')}}" onblur="upperCase()">
        @error('antibiotic_d')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Fecha Elaboración:</label>
        <input type="date" class="form-control {{$errors->has('date_e') ? 'is-invalid':''}}" id="fecha_e" name="date_e" value="{{old('date_e')}}">
        @error('date_e')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Fecha Caducidad:</label>
        <input type="date" class="form-control {{$errors->has('date_c') ? 'is-invalid':''}}" id="fecha_c" name="date_c" value="{{old('date_c')}}">
        @error('date_c')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control {{$errors->has('supplier') ? 'is-invalid':''}}" id="supplier" name="supplier" value="{{old('supplier')}}" onblur="upperCase()">
        @error('supplier')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>  
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{old('actual_state')}}">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
         </select>
    </div>  
    <center>
        <div class="form-group"style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/confAnt')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/confAnt') }}" >Guardar</button>
        </div>
    </center>   
    @include('layouts.base-usuario')
</form>
<script>
    ////bloqueo de fechas futuras
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("fecha_e").setAttribute("max", today);

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("fecha_c").setAttribute("min", today);
</script>
@endsection


















