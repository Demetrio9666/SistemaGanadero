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
            <div class="image"></div>
            <div class="frm">
                <h1>Registrar Vitamina</h1>
                <form action="{{route('confVi.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de la Vitamina:</label>
                        <input type="text" class="form-control" id="vitamina_d" name="vitamin_d">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Elaboración:</label>
                        <input type="date" class="form-control" id="fecha_e" name="date_e">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Caducidad:</label>
                        <input type="date" class="form-control" id="fecha_c" name="date_c">
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
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confVi')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confVi') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
</body>