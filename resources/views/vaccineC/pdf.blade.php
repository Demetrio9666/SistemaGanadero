@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Controles de Vacunaciones Activos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">          
    <thead>            
        <tr>
            <th>Fecha de la Vacunación</th>
            <th>Código del Animal</th>
            <th>Vacuna</th>
            <th>Fecha de próxima dosis</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($vacunaC as $i)           
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td >{{$i->vacuna}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>