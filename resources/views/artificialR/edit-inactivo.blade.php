@extends('artificialR.base')
@section('nombre_regitro')
Editar Material Genético Inactivo
@endsection
@section('formulario')
<form action="{{route('inactivos.Materiales.update',$arti->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Fecha de Registro:</label>
        <input type="date" class="form-control" id="fecha_r" name="date" value="{{$arti->date}}" disabled=disabled>
    </div>
    <div class="form-group">
        <label for="">Raza:</label>
        <select class="form-control" id="razas" name="race_id"  value="{{$arti->race_id}}"  disabled=disabled>
                <option></option>
            @foreach ( $razas as $i )   
                <option value="{{$i->id}}" @if($arti->race_id == $i->id) selected @endif > {{$i->race_d}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Tipo de Material Genético:</label>

        <select class="form-control" id="inputPassword4"  name="reproduccion"   value="{{$arti->reproduccion}}" disabled=disabled>
        
           <option selected></option>
           <option value ="PAJUELA" @if( $arti->reproduccion == "PAJUELA") selected @endif>PAJUELA</option>
           <option value ="HEMBRIONAL" @if($arti->reproduccion == "HEMBRIONAL")selected @endif >HEMBRIONAL</option>
            
      </select>
    </div>  
    <div class="form-group">
        <label for="">Proveedor:</label>
        <input type="text" class="form-control" id="proveedor" name="supplier"   value="{{$arti->supplier}}"onblur="upperCase()"disabled=disabled>
    </div>      
    <div  class="form-group">
        <label for="">Estado actual de la Información:</label>
        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$arti->actual_state}}">
            <option value="ACTIVO" @if( $arti->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
            <option value="INACTIVO" @if( $arti->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
         </select>
    </div> 
    <center>
        <div class="form-group" style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/inactivos/Materiales')}}">Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/inactivos/Materiales') }}" >Guardar</button>
        </div>
    </center>    
    @include('layouts.base-usuario')
</form>
@endsection
