@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Reproducción por Monta Natural Externa
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%"> 
    <thead>            
        <tr>
            <th>Fecha de Registro</th>
            <th>Código Animal</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Código Externo</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Hacienda</th>
            <th>Estado de la Reproducción</th>
            <th>Estado actual de la Información</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($ext as $i)         
        <tr>
            <td >{{$i->date}}</td>
            <td>{{$i->animalCode}}</td>
            <td>{{$i->raza}}</td>
            <td>{{$i->edad}}</td>
            <td>{{$i->sexo}}</td>
            <td>{{$i->animalCode_Exte}}</td>
            <td>{{$i->race_d}}</td>
            <td>{{$i->age_month}}</td>
            <td>{{$i->sex}}</td>
            <td>{{$i->hacienda_name}}</td>
            <td >{{$i->reproduction_state}}</td>
            <td >{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>