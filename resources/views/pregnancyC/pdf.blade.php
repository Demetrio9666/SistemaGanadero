@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Control de Preñes
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">      
    <thead>            
        <tr>
            <th>Fecha de control</th>
            <th>Código del Animal</th>
            <th>Vitamina </th>
            <th>Alternativa 1</th>
            <th>Alternativa 2</th>
            <th>Observación</th>
            <th>Fecha de próximo control</th>
            <th>Estado Actual</th>  
           
        </tr>
    </thead>
    <tbody>  
        @foreach ($pre as $i)       
        <tr>
            <td>{{$i->date}}</td>
            <td>{{$i->animal}}</td>
            <td >{{$i->vitamina}}</td>
            <td >{{$i->alt1}}</td>
            <td >{{$i->alt2}}</td>
            <td >{{$i->observation}}</td>
            <td >{{$i->date_r}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
