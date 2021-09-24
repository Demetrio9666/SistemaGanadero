@extends('adminlte::page')
@section('content_header')
<label>Hora:</label>
<br>
<div id="reloj" class="reloj">00 : 00 : 00</div>
<br>
<br>
        <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book-open"></i>
                Actividades de Usuarios
            </div>
        </div>
                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>             
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Pantalla</th>
                            <th>Dato</th>
                            <th>Fecha creación</th>
                            <th>Fecha actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($log as $i)          
                        <tr>
                            <td>{{$i->log_name}}</td>
                            <td>{{$i->email}}</td>
                            <td >{{$i->rol}}</td>
                            <td >{{$i->description}}</td>
                            <td >{{$i->view}}</td>
                            <td >{{$i->data}}</td>
                            <td >{{$i->created_at}}</td>
                            <td >{{$i->updated_at}}</td>  
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
        </div>
@endsection