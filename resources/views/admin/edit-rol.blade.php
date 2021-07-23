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
                        
                        <h1 style="margin: 50px">Editar Roles</h1>
                        @error('Nombre_del_rol')
                        <div class="alert alert-danger">
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @enderror
                        {!! Form::model($rol,['route'=>['rol.update',$rol],'method'=>'put']) !!}
                            @include('admin.base.plantilla')
                        {!! Form::close() !!}
                        

                        
                    </div>

                </div>

            </div>
            
        </div>
    @endsection
    @section('js')
    @endsection
</body>