@extends('weigthC.base')
@section('nombre_regitro')
Editar Peso de Animales
@endsection
@section('formulario')
<form action="{{route('controlPeso.update',$pesoC->id)}}"   method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fecha" name="date" value="{{$pesoC->date}}">
        </div>
        <div class="col-md-6">
           
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-primary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text"  placeholder="Código Animal" aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animal as $i)
                                    @if ($pesoC->animalCode_id == $i->id )
                                         value ="{{$i->animalCode}}"
                                    @endif
                        @endforeach>
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$pesoC->animalCode_id}}">
                        
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Peso KG:</label>
            <input type="text" class="form-control" id="peso" name="weigtht" value="{{$pesoC->weigtht}}" onChange="ValidarPeso(this.value)">
        </div>
        
        <div class="col-md-6">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$pesoC->date_r}}">
        </div>
        <div  class="col-md-6">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$pesoC->actual_state}}">
                <option value="ACTIVO" @if( $pesoC->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                    <option value="INACTIVO" @if( $pesoC->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('/controlPeso')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/controlPeso') }}" >Guardar</button>
            </div>
        </center>
    </div>
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
            document.getElementById("fecha").setAttribute("max", today);
  </script>
@endsection



