<head>
    <link href="{{asset('css/app.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    @extends('adminlte::page')
    @section('title')
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                <h1>Editar Vacuna</h1>
                <form action=" {{route('confVacuna.update',$vacuna->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de la Vacuna:</label>
                        <input type="text" class="form-control" id="vacuna" name="vaccine_d" value="{{$vacuna->vaccin_d}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Elaboración:</label>
                        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$vacuna->date_e}}">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Caducidad:</label>
                        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$vacuna->date_c}}" >
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="proveedor" name="supplier" value="{{$vacuna->supplier}}" >
                    </div>  
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vacuna->actual_state}}">
                            <option>Disponible</option>
                            <option>Inactivo</option>
                         </select>
                    </div>         
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confVacuna')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confVacuna') }}" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    @endsection
  </body>