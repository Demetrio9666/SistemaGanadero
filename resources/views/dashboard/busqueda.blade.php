@extends('dashboard.base')

@section('nombre_regitro')
         Animal
@endsection

@section('formulario')
<div class="contenedor">
    <form action="{{route('dashboard-busqueda.store')}}" method="POST" >                                                     
        @csrf
        <button type="submit"  class="btn btn-success "  style="margin: 10px"  >Buscar</button>
        <input type="text" name="buscar" id="buscar" placeholder="Código Animal" >
    </form>
</div>
@endsection


