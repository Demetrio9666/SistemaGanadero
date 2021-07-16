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
                        
                        <h1>Editar Roles</h1>
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
                        {!! Form::Model($id,['route' => 'rol.store']) !!}

                            @include('admin.base.plantilla')

                            <div class="col-md-6-self-center" style="margin: 80px">
                                <a type="button"  class="btn btn-secondary btn-lg"   href="{{url('/rol')}}">Cancelar</a>
                                <button type="sutmit" id="btguardar" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/rol') }}" >Guardar</button>
                             </div>
                        {!! Form::close() !!}
        
                    </div>

                </div>

            </div>
            
        </div>
    @endsection
    @section('js')
    @endsection
</body>