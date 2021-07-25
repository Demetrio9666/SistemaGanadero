@extends('adminlte::page')
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
  </head>
  <body>
    @section('title')
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
            <div class="image"></div>
            <div class="frm">
                <h1>Editar Vitamina</h1>
                <form action=" {{route('confVi.update',$vitamina->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre de la Vitamina:</label>
                        <input type="text" class="form-control" id="vitamina_d" name="vitamin_d" value="{{$vitamina->vitamin_d}}" onblur="upperCase()" >
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Elaboración:</label>
                        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$vitamina->date_e}}">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Caducidad:</label>
                        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$vitamina->date_c}}" >
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$vitamina->supplier}}" onblur="upperCase()">
                    </div>   
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$vitamina->actual_state}}">
                            <option value="DISPONIBLE" @if( $vitamina->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                            <option value="INACTIVO" @if( $vitamina->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                         </select>
                    </div>        
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confVi')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confVi') }}" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    <script>
        function upperCase() {
               var x=document.getElementById("vitamina_d").value
               document.getElementById("vitamina_d").value=x.toUpperCase()
               var x=document.getElementById("supplier").value
               document.getElementById("supplier").value=x.toUpperCase()
           }

   </script>
    @endsection
  </body>