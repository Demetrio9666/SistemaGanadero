@extends('layouts.pdf')
@section('nombre_tabla')
Registros de Razas Activas
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">          
    <thead>            
        <tr>
            <th>Nombre de la Raza</th>
            <th>Porcentaje</th>
            <th>Estado actual de la Información</th> 
        </tr>
    </thead>
    <tbody>  
        @foreach ($raza as $i)       
        <tr>
            <td >{{$i->race_d}}</td>
            <td>{{$i->percentage}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>