@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    
    @section('css')
    
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            <div class="card">
                <div class="card-body">
                    <div class="frm">
                        <h1> Nombre del Usuario:</h1>
                        <center>
                            <h2> {{$usuario->name}}</h2>
                        </center>
                        <h5>Listado de Roles</h5>
                        {!! Form::model($usuario, ['route' => ['usuarios.update',$usuario],'method'=>'put']) !!}
                            @foreach ($roles as $role )
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=> 'mr-1']) !!}
                                        {{$role->name}}
                                    </label>
                                </div>
                            @endforeach
                            {!! Form::submit('Asignación', ['class'=>'btn btn-primary mt-2']) !!}
                        {!! Form::close() !!}

                        
                    </div>

                </div>

            </div>
            
        </div>
    @endsection
    @section('js')
    @endsection
</body>