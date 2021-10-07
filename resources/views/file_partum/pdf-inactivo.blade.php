@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Partos Inactivos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
            <tr>
                <th>Fecha</th>
                <th>Código del Animal</th>
                <th>Cant.Machos </th>
                <th>Cant.Hembras</th>
                <th>Cant.Muertos</th>
                <th>Estado Animal</th>
                <th>Tipo de Parto</th>
                <th>Estado actual de la Información</th> 
            </tr> 
    </thead>
    <tbody>  
        @foreach ($par as $i)          
        <tr>
            <td>{{$i->date}}</td>
            <td>{{$i->animal}}</td>
            <td >{{$i->male}}</td>
            <td >{{$i->female}}</td>
            <td >{{$i->dead}}</td>
            <td >{{$i->mother_status}}</td>
            <td >{{$i->partum_type}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>