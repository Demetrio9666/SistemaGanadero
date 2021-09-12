@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Animales Activos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
    <thead>            
        <tr>
            <th >Código Animal</th>
            <th >Fecha Nacimiento</th>
            <th >Raza</th>
            <th >Sexo</th>
            <th >Etapa</th>
            <th >Origen</th>
            <th >Meses</th>
            <th >Salud</th>
            <th >Embarazo</th>
            <th >Localización</th>
            <th >Estado Actual</th> 
            <th >Concebido</th>  
           
        </tr>
    </thead>
    <tbody>  
        @foreach ($animal as $i)          
        <tr>
            <td >{{$i->animalCode}}</td>
            <td >{{$i->date}}</td>
            <td >{{$i->raza}}</td>
            <td >{{$i->sex}}</td>
            <td >{{$i->stage}}</td>
            <td >{{$i->source}}</td>
            <td >{{$i->age_month}}</td>
            <td >{{$i->health_condition}}</td>
            <td >{{$i->gestation_state}}</td>
            <td >{{$i->ubicacion}}</td>
            <td >{{$i->actual_state}}</td>
            <td >{{$i->conceived}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>
