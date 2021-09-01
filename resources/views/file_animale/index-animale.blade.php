@extends('layouts.baseTablas')
@section('nombre_card')
        Registros Activos
@endsection
@section('boton_registro')
"{{url('fichaAnimal/create')}}"
@endsection
@section('boton_reciclaje')
"{{url('inactivos/fichaAnimales')}}"
@endsection
@section('boton_reporte_excel')
"{{url('exportar-excel-fichaAnimal')}}"
@endsection
@section('boton_reporte_pdf')
"{{url('descarga-pdf-fichaAnimal')}}"
@endsection

@section('nombre_tabla')
Fichas de Animales Activos
@endsection
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
    <thead>            
        <tr>
            <th>Código Animal</th>
            <th>Foto</th>
            <th>Fecha Nacimiento</th>
            <th>Raza</th>
            <th>Sexo</th>
            <th>Etapa</th>
            <th>Origen</th>
            <th>Edad-meses</th>
            <th>Salud</th>
            <th>Embarazo</th>
            <th>Estado Actual</th> 
            <th>localización</th>
            <th>Concebido</th>  
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($animal as $i)          
        <tr>
            <td>{{$i->animalCode}}</td>
            <td>
                <img src="{{asset($i->url)}}" width="50px" height="50px">
            </td>
            <td >{{$i->date}}</td>
            <td >{{$i->raza}}</td>
            <td >{{$i->sex}}</td>
            <td >{{$i->stage}}</td>
            <td >{{$i->source}}</td>
            <td >{{$i->age_month}}</td>
            <td >{{$i->health_condition}}</td>
            <td >{{$i->gestation_state}}</td>
            <td >{{$i->actual_state}}</td>
            <td >{{$i->ubicacion}}</td>
            <td >{{$i->conceived}}</td>
            <td>
                <center>
                    <a class="btn btn-primary" href="{{route('fichaAnimal.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                </center>
                
                                     
            </td>  
        </tr>
        @endforeach
    </tbody>
</table>
@endsection