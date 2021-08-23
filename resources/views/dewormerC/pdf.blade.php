@extends('layouts.pdf')
@section('nombre_tabla')
Registros de Control de Desparacitaciones
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">  
    <thead>            
        <tr>
            <th>Fecha de Desparasitación</th>
            <th>Código del Animal</th>
            <th>Desparasitante</th>
            <th>Fecha de re-desparasitación</th>
            <th>Estado Actual</th> 
        </tr>
    </thead>
    <tbody>  
        @foreach ($desC as $i)         
        <tr>
            <td>{{$i->date}}</td>
            <td >{{$i->animal}}</td>
            <td>{{$i->des}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>
