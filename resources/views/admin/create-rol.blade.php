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
            <i class="fas fa-book"></i>
            Registrar roles </h3>

         </div>
        <div class="container" id="registration-form">
            <div class="card">
                <div class="card-body">
                    <div class="frm">
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
                        {!! Form::open(['route' => 'rol.store']) !!}
                             <label for="" class="form-label">Nombre del Rol:</label>
                             <input type="text" class="form-control {{$errors->has('rol')?'is-invalid':''}}" id="rol" name="rol"  onblur="upperCase()">
                             @error('rol')
                                   <div class="invalid-feedback">{{$message}}</div>
                             @enderror
                            @include('admin.base.plantilla')
                            
                        {!! Form::close() !!}
        
                    </div>

                </div>

            </div>
            
        </div>
    </div>
    @endsection
    @section('js')
    @endsection
