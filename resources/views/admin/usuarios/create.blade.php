@extends('admin.usuarios.base')

@section('nombre_regitro')
         Registro de Usuarios
@endsection
@section('formulario')
<form action="{{route('usuarios.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre y Apellido:</label>
        <input type="text" class="form-control {{$errors->has('nombreU') ? 'is-invalid':''}}" id="nombre" name="nombreU" value="{{old('nombre')}}">
        
        @error('nombreU')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Correo Electrónico:</label>
        <input type="mail" class="form-control {{$errors->has('correoU') ? 'is-invalid':''}}" id="email" name="correoU" value="{{old('correoU')}}">
        @error('correoU')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>  
    <div class="form-group">
        <label for="">Contraseña:</label>
        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid':''}}" id="contraseña" name="password" value="{{old('password')}}">
        @error('password')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div> 
    <div class="form-group">
        <label for="">Confirmación de contraseña:</label>
        <input type="password" class="form-control {{$errors->has('nombreU') ? 'is-invalid':''}}" id="confirmacion" name="confirmacionU" value="{{old('confirmacionU')}}">
        @error('confirmacionU')
             <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div> 
      
    <center>
        <div class="form-group"  style="margin: 40px">
            <a type="submit" class="btn btn-secondary btn" href="{{url('/usuarios')}}" >Cancelar</a>
            <button type="submit" class="btn btn-success btn"  href="{{ Redirect::to('/usuarios') }}" >Guardar</button>
        </div>
    </center>
    @include('layouts.base-usuario')
</form>
@endsection