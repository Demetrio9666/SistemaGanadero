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
                <h1>Editar Antibiótico</h1>
                <form action=" {{route('confAnt.update',$anti->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nombre del Antibiótico:</label>
                        <input type="text" class="form-control" id="antibiotic_d" name="antibiotic_d" value="{{$anti->antibiotic_d}}" onblur="upperCase()">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Elaboración:</label>
                        <input type="date" class="form-control" id="fecha_e" name="date_e" value="{{$anti->date_e}}">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Caducidad:</label>
                        <input type="date" class="form-control" id="fecha_c" name="date_c" value="{{$anti->date_c}}" >
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" value="{{$anti->supplier}}" onblur="upperCase()" >
                    </div>   
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$anti->actual_state}}">
                            <option selected></option>
                            <option value="DISPONIBLE" @if($anti->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                            <option value="INACTIVO" @if($anti->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
                         </select>
                    </div>        
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confAnt')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confAnt') }}" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('js')
    <script>
        function upperCase() {
               var x=document.getElementById("antibiotic_d").value
               document.getElementById("antibiotic_d").value=x.toUpperCase()
               var x=document.getElementById("supplier").value
               document.getElementById("supplier").value=x.toUpperCase()
           }

   </script>
    @endsection
  </body>