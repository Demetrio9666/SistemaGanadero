@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Reproducción Artificial Inactivos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
            <tr>
                <th>Fecha de Registro</th>
                <th>Código del Animal</th>
                <th>Raza </th>
                <th>Tipo de Reproducción Artificial</th>
                <th>Raza Material Genético</th>
                <th>Estado Actual</th> 
            </tr> 
    </thead>
    <tbody>  
        @foreach ($re_A as $i)         
        <tr>
            <td>{{$i->fecha_A}}</td>
            <td>{{$i->animalA}}</td>
            <td>{{$i->raza_h}}</td>
            <td >{{$i->tipo}}</td>
            <td >{{$i->raza_m}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>