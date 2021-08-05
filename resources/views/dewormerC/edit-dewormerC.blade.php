@extends('dewormerC.base')
@section('nombre_regitro')
Editar Control de Desparasitación
@endsection
@section('formulario')
<form action="{{route('controlDesparasitacion.update',$desC->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Fecha de Desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date" value="{{$desC->date}}">
        </div>
        <div class="col-md-6">
                <div class="input-group mb-3" style="margin: 40px">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                        <input type="text" placeholder="Código Animal"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                        @foreach ($animal as $i)
                                    @if ($desC->animalCode_id == $i->id )
                                         value =" {{$i->animalCode}} "
                                    @endif
                        @endforeach>
                       
                       
                        <input type="hidden" id="idcodi" name="animalCode_id" value="{{$desC->animalCode_id}}">
                        
                </div>
        </div>
        <div class="col-md-6">
            <label for="">Desparasitante:</label>
            <select class="form-control" id="inputPassword4"  name="deworming_id"   value="{{$desC->deworming_id}}">
                <option selected></option>
                @foreach ($des as $i )   
                    <option value="{{$i->id}}" @if($desC->deworming_id == $i->id ) selected @endif>{{$i->dewormer_d}}</option>       
                @endforeach
          </select>
        </div>  
    
        <div class="col-md-6">
            <label for="">Fecha de re-desparasitación:</label>
            <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$desC->date_r}}">
        </div>
        <div  class="form-group">
            <label for="">Estado Actual:</label>
            <select class="form-control" id="inputPassword4" name="actual_state" value="{{$desC->actual_state}}">
                <option value="DISPONIBLE" @if( $desC->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                <option value="INACTIVO" @if( $desC->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
             </select>
        </div> 
        <center>
            <div class="col-md-6" style="margin: 40px">
                <a type="submit" class="btn btn-secondary btn" href="{{url('/controlDesparasitacion')}}">Cancelar</a>
                <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/controlDesparasitacion') }}" >Guardar</button>
            </div>
        </center> 
       
    </div>

</form>
@endsection