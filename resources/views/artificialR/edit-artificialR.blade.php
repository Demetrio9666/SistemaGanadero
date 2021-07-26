@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
    
    @section('css')
    
    <link rel="stylesheet" type="text/css" href="/css/configuracion2.css">
    @endsection
    @section('content_header')
        <div class="container" id="registration-form">
            @include('messages.message')
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
                                <option></option>
                            @foreach ( $razas as $i )   
                                <option value="{{$i->id}}" @if($arti->race_id == $i->id) selected @endif > {{$i->race_d}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Material Genético:</label>

                        <select class="form-control" id="inputPassword4"  name="reproduccion"   value="{{$arti->reproduccion}}">
                        
                           <option selected></option>
                           <option value ="PAJUELA" @if( $arti->reproduccion == "PAJUELA") selected @endif>PAJUELA</option>
                           <option value ="HEMBRIONAL" @if($arti->reproduccion == "HEMBRIONAL")selected @endif >HEMBRIONAL</option>
                            
                      </select>
                    </div>  
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <input type="text" class="form-control" id="proveedor" name="supplier"   value="{{$arti->supplier}}"onblur="upperCase()">
                    </div>      
                    <div  class="form-group">
                        <label for="">Estado Actual:</label>
                        <select class="form-control" id="inputPassword4" name="actual_state" value="{{$arti->actual_state}}">
                            <option value="DISPONIBLE" @if( $arti->actual_state == "DISPONIBLE") selected @endif>DISPONIBLE</option>
                            <option value="INACTIVO" @if( $arti->actual_state == "INACTIVO") selected @endif>INACTIVO</option>
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
    <script>
        function upperCase() {
                var x=document.getElementById("proveedor").value
                document.getElementById("proveedor").value=x.toUpperCase()
               
            }
    </script>
    @endsection
</body>