@extends('layouts.pdf')
@section('nombre_tabla')
Fichas de Tratamientos Inactivos
@endsection
@section('tabla')
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">   
                <thead>            
                        <tr>
                            <th>Fecha de Tratamiento</th>
                            <th>Código del Animal</th>
                            <th>Enfermedad </th>
                            <th>Detalle</th>
                            <th>Antibiótico</th>
                            <th>Vitamina</th>
                            <th>Tratamiento</th>
                            <th>Recuperación</th>
                            <th>Estado actual de la Información</th>
                        </tr> 
                </thead>
                <tbody>  
                    @foreach ($tra as $i)         
                    <tr>
                        <td>{{$i->date}}</td>
                        <td>{{$i->animal}}</td>
                        <td>{{$i->disease}}</td>
                        <td>{{$i->detail}}</td>
                        <td>{{$i->anti}}</td>
                        <td>{{$i->vi}}</td>
                        <td>{{$i->treatment}}</td>
                        <td>{{$i->recovery}}</td>
                        <td>{{$i->actual_state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
<form>
</form>