@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Controles de Pesos Activos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
    <thead>            
        <tr>
            <th>Fecha de Registro</th>
            <th>Código del Animal</th>
            <th>Peso</th>
            <th>Fecha de próximo control</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($pesoC as $i)           
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td >{{$i->weigtht}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>