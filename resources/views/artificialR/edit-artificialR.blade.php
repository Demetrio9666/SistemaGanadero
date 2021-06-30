<head>
    <link href="{{asset('css/app.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    @extends('adminlte::page')
    @section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                <h1>Editar</h1>
                <form action="{{route('confMate.update',$arti->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="fecha_r" name="date" value="{{$arti->date}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Raza:</label>
                        <select class="form-control" id="razas" name="race_id"  value="{{$arti->race_id}}"  >
                                <option>Seleccione la Raza</option>
                            @foreach ( $razas as $i )   
                                <option value="{{$i->id}}" @if($arti->race_id == $i->id) selected @endif > {{$i->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Material Genetico:</label>

                        <select class="form-control" id="inputPassword4"  name="reproduccion"   value="{{$arti->reproduccion}}">
                        
                           <option selected>...</option>
                           <option value ="Pajuela" @if( $arti->reproduccion == "Pajuela") selected @endif>Pajuela</option>
                           <option value ="Hembrional" @if($arti->reproduccion == "Hembrional")selected @endif >Hembrional</option>
                            
                      </select>
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="proveedor" name="supplier"   value="{{$arti->supplier}}">
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