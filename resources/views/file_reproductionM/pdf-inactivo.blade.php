@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Reproducción por Monta Natural Interna Inactivos
@endsection

@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">     
    <thead>            
            <tr>
                <th>Fecha de Registro</th>
                <th>Código del Animal Hembra</th>
                <th>Raza </th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Código del Animal Macho</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Estado Actual</th> 
                <th>Acción</th>
            </tr> 
    </thead>
    <tbody>  
        @foreach ($re_MI as $i)         
        <tr>
            <td>{{$i->fecha_MI}}</td>
            <td>{{$i->animal_h_MI}}</td>
            <td>{{$i->raza_h_MI}}</td>
            <td>{{$i->edad_h}}</td>
            <td>{{$i->sexo_h}}</td>
            <td>{{$i->animal_m_MI}}</td>
            <td>{{$i->raza_m_MI}}</td>
            <td>{{$i->edad_m}}</td>
            <td>{{$i->sexo_m}}</td>
            <td>{{$i->actual_state}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<form>
</form>