@extends('pregnancyC.base')
@section('nombre_regitro')
Editar Control de preñez Inactiva
@endsection
@section('formulario')
<form action="{{route('inactivos.controlPrenes.update',$pre->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Vacunacion:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{$pre->date}}"disabled=disabled>
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-outline-secondary" disabled=disabled type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text"  placeholder="Código Animal"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animal as $i)
                                    @if ($pre->animalCode_id == $i->id )
                                         value =" {{$i->animalCode}} "
                                    @endif
                        @endforeach>
                       
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$pre->animalCode_id}}">
                        
                </div>
        </div>
        <div class="form-group">
            <label for="">Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="vitamin_id"   value="{{$pre->vitamin_id}}" disabled=disabled>
                <option selected></option>
                @foreach ($vitamina as $i )   
                    <option value="{{$i->id}}" @if($pre->vitamin_id == $i->id ) selected @endif>{{$i->vitamin_d}}</option>
                    
                @endforeach
          </select>
        </div>  
    
        <div class="form-group">
            <label for="">Alternativa 1 de Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="alternative1"   value="{{$pre->alternative1}}" disabled=disabled>
                <option selected>N/A</option>
                @foreach($vitamina as $i )   
                <option {{$i->id}}  @if($pre->alternative1 == $i->vitamin_d ) value= "{{$i->vitamin_d}}"  selected  @endif>{{$i->vitamin_d}} </option>
                    
                @endforeach
          </select>
        </div>  
        <div class="form-group">
            <label for="">Alternativa 2 de Vitamina:</label>
            <select class="form-control" id="inputPassword4"  name="alternative2"   value="{{$pre->alternative2}}" disabled=disabled>
                <option selected>N/A</option>
                @foreach ($vitamina as $i )   
                <option {{$i->id}}  @if($pre->alternative2 == $i->vitamin_d ) value= "{{$i->vitamin}}" selected  @endif>{{$i->vitamin_d}}</option>
                    
                @endforeach
          </select>
        </div>  
        <div class="form-group">
            <label for="">Observación:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observation" disabled=disabled>{{$pre->observation}} </textarea>
        </div>
    
        <div class="form-group">
            <label for="">Fecha de próximo control:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$pre->date_r}}" disabled=disabled>
        </div>
        <div  class="form-group">
            <label for="">Estado actual de la Información:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$pre->actual_state}}">
                <option value="ACTIVO" @if( $pre->actual_state == "ACTIVO") selected @endif>ACTIVO</option>
                <option value="INACTIVO" @if( $pre->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div> 
         <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('inactivos/controlPrenes')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('inactivos/controlPrenes') }}" >Guardar</button>
            </div>
        </center>   
        
    </div>
    @include('layouts.base-usuario')
</form>
@endsection
