@extends('layouts.pdf')
@section('nombre_tabla')
Registros de Vitaminas Inactivos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
        <tr>
            <th>Nombre de la Vitamina</th>
            <th>Fecha Elaboración</th>
            <th>Fecha Caducidad </th>
            <th>Proveedor</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($vitamina as $i)           
        <tr>
            <td>{{$i->vitamin_d}}</td>
            <td >{{$i->date_e}}</td>
            <td>{{$i->date_c}}</td>
            <td >{{$i->supplier}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>