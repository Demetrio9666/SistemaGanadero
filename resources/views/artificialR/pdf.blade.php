@extends('layouts.pdf')
@section('nombre_tabla')
Registros de Materiales Genéticos Activos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">            
    <thead>            
        <tr>
            <th>Fecha de Registro</th>
            <th>Raza</th>
            <th>Tipo de Material Genético</th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($arti as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->raza}}</td>
            <td>{{$i->reproduccion}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>
