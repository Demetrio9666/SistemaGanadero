@extends('adminlte::page')
<head>
   
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
   
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        
        <div class="image"></div>
        <div class="frm">
            <h1>Registro de Animales Inactivos</h1>
            <form action="{{route('inactivos.fichaAnimales.update', $animal->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div  class="col-md-6">
                    <label for="" class="form-label">Código Animal:</label>
                    <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="{{$animal->animalCode}}" disabled=disabled >
                </div>
                <div  class="col-md-6">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_n" name="fecha_nacimiento"  value="{{$animal->date}}" disabled=disabled >
                </div>
                <div  class="col-md-6">
                    <label for="">Raza:</label>
                    <select class="form-control" id="razas" name="raza"  value="{{$animal->race_id}}" disabled=disabled >
                            <option selected></option>
                        @foreach ( $raza as $i )   
                            <option value="{{$i->id}}" @if($animal->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                        @endforeach
                    </select>

                </div> 
                <div  class="col-md-6">
                    <label for="">Sexo:</label>
                    <select class="form-control" id="inputPassword4" name="sexo" value="{{$animal->sex}}" disabled=disabled>
                        <option selected></option>
                        <option  value="Macho"   @if($animal->sex == "Macho" ) selected @endif>Macho</option>
                        <option value="Hembra"   @if($animal->sex == "Hembra" ) selected @endif>Hembra</option>
                  </select>
                </div> 
                <div  class="col-md-6">
                    <label for="">Etapa:</label>
                    <select class="form-control" id="inputPassword4" name="etapa"  value="{{$animal->stage}}" disabled=disabled>
                        <option selected></option>
                        <option value="Vaca"   @if($animal->stage == "Vaca" ) selected @endif>Vaca</option>
                        <option value="Toro"   @if($animal->stage == "Toro" ) selected @endif>Toro</option>
                        <option value="Ternero"   @if($animal->stage == "Ternero" ) selected @endif>Ternero</option>
                        <option value="Vaquilla"   @if($animal->stage == "Vaquilla" ) selected @endif>Vaquilla</option>
                        <option value="Novillo"   @if($animal->stage == "Novillo" ) selected @endif>Novillo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Origen:</label>
                    <select class="form-control" id="inputPassword4" name="origen" value="{{$animal->source}}" disabled=disabled>
                        <option selected></option>
                        <option value="Nacido"   @if($animal->source == "Nacido" ) selected @endif>Nacido</option>
                        <option value="Comprado"   @if($animal->source == "Comprado" ) selected @endif>Comprado</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Edad-Meses:</label>
                    <input type="int" class="form-control" id="proveedor" name="edad" value="{{$animal->age_month}}" disabled=disabled>
                </div>
                <div  class="col-md-6">
                    <label for="">Estado de Salud:</label>
                    <select class="form-control" id="inputPassword4" name="estado_de_salud" value="{{$animal->health_condition}}" disabled=disabled>
                        <option selected></option>
                        <option value="Sano"   @if($animal->health_condition == "Sano" ) selected @endif>Sano</option>
                        <option value="Enfermo"   @if($animal->health_condition == "Enfermo" ) selected @endif>Enfermo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Embarazo:</label>
                    <select class="form-control" id="inputPassword4" name="estado_de_gestacion" value="{{$animal->gestation_state}}" disabled=disabled>
                        <option selected></option>
                        <option value="Si"  @if($animal->gestation_state == "Si" ) selected @endif>Si</option>
                        <option value="No"  @if($animal->gestation_state == "No" ) selected @endif>No</option>
                  </select>
                </div>

                
                <div  class="col-md-6">
                    <label for="">Ubicación:</label>
                    <select class="form-control" id="" name="localizacion"   value="{{$animal->location_id}}" disabled=disabled>
                            <option></option>
                        @foreach ($ubicacion as $i )   
                            <option value="{{$i->id}}" @if($animal->location_id == $i->id ) selected @endif >{{$i->location_d}}</option>
                        @endforeach
                    </select>

                </div> 
                <div class="col-md-6">
                    <label for="">Concebedido:</label>
                    <select class="form-control" id="inputPassword4" name="concebido" value="{{$animal->conceived}}" disabled=disabled>
                        <option selected></option>
                        <option value="Monta"   @if( $animal->conceived == "Monta") selected @endif >Monta</option>
                        <option value="Insiminacion Artificial"   @if( $animal->conceived == "Insiminacion Artificial") selected @endif>Insiminacion Artificial</option>
                        <option value="Embrional"   @if( $animal->conceived == "Embrional") selected @endif>Embrional</option>
                  </select>
                </div>

                <div  class="col-md-6">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$animal->actual_state}}">
                        <option selected></option>
                        <option value="Disponible" @if($animal->actual_state == "Disponible" ) selected @endif>Disponible</option>
                        <option value="Vendido"    @if($animal->actual_state == "Vendido" ) selected @endif>Vendido</option>
                        <option value="Inactivo"   @if($animal->actual_state == "Inactivo" ) selected @endif>Inactivo</option>
                        <option value="Reproduccion"  @if($animal->actual_state == "Reproduccion" ) selected @endif>Reproduccion</option>
                  </select>
                </div>
                <div class="col-md-6-self-center" style="margin: 80px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/inactivos/fichaAnimales')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/inactivos/fichaAnimales') }}" >Guardar</button>
  
                </div>
            </form>
        </div>
    </div>
    
    @endsection
    @section('js')
    @endsection
</body>