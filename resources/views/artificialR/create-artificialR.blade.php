<head>
    <link href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @extends('adminlte::page')
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Registrar</h1>
                <form action="{{route('confMate.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="fecha_r" name="date" >
                    </div>
                    <div class="form-group">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id">
                            <option selected></option>
                            @foreach ( $razas as $i )   
                                <option value="{{$i->id}}">{{$i->race_d}}</option>
                            @endforeach
                        </select>
    
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Material Genetico:</label>
                        <select class="form-control" id="inputPassword4"  name="reproduccion">
                            <option selected></option>
                            <option>Pajuela</option>
                            <option>Hembrional</option>
                      </select>
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="proveedor" name="supplier">
                    </div> 
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state">
                            <option>Disponible</option>
                            <option>Inactivo</option>
                         </select>
                    </div>      
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confMate')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confMate') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
</body>