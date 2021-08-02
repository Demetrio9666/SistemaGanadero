@extends('adminlte::page')
<head>
        @section('css')
           
        @endsection 
</head>
    @section('content_header')
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-book-open"></i>
              Registros Activos</h3>

        </div>
        <div class="col-lg-3 col-6">
                <a type="button" title="Agregar nuevo registro" class="btn-lg btn-success " style="margin: 10px" id="button-addon1" href="{{url('fichaAnimal/create')}}"><i class="fas fa-plus-square"></i></a>
                <a type="button" title="Registros inactivos" class="btn-lg btn-warning " style="margin: 10px" id="button-addon1" href="{{url('inactivos/fichaAnimales')}}"><i class="fas fa-trash"></i></a>
                <a type="button" title="Descarga reportes en Excel" class="btn-lg btn-success " style="margin: 10px"  id="button-addon1" href="{{url('exportar-excel-fichaAnimal')}}"><i class="fas fa-file-excel"></i></a>
                <a type="button" title="Descarga reportes en PDF" class="btn-lg btn-danger "  id="button-addon1" href="{{url('descarga-pdf-fichaAnimal')}}"><i class="fas fa-file-pdf"></i></a>
        </div>
                <div class="card">
                    <div class="card-body">
                        <div class="titulo "><h1>Fichas de Animales</h1></div>
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
                                    <th>localización</th>
                                    <th>Estado Actual</th> 
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
                                    <td >{{$i->ubicacion}}</td>
                                    <td >{{$i->actual_state}}</td>
                                    <td >{{$i->conceived}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('fichaAnimal.edit',$i->id)}}" ><i class="fas fa-edit"></i></a>
                                                             
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    
    @endsection

@section('js')
            
@endsection
