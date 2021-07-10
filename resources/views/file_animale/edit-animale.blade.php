@extends('adminlte::page')
<head>
    <link href="{{asset('css/app.css')}}">
    
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
            <h1>Registro de Animales</h1>
            <form action="{{route('fichaAnimal.update', $animal->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div  class="col-md-6">
                    <label for="" class="form-label">Código Animal:</label>
                    <input type="text" class="form-control" id="codigoAnimal" name="animalCode" value="{{$animal->animalCode}}">
                </div>
                <div  class="col-md-6">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_n" name="date_n"  value="{{$animal->date_n}}">
                </div>
                <div  class="col-md-6">
                    <label for="">Raza:</label>
                    <select class="form-control" id="razas" name="race_id"  value="{{$animal->race_id}}">
                            <option selected>Seleccione la Raza</option>
                        @foreach ( $raza as $i )   
                            <option value="{{$i->id}}" @if($animal->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                        @endforeach
                    </select>

                </div> 
                <div  class="col-md-6">
                    <label for="">Sexo:</label>
                    <select class="form-control" id="inputPassword4" name="sex" value="{{$animal->sex}}">
                        <option selected>...</option>
                        <option value="Macho"   @if($animal->sex == "Macho" ) selected @endif>Macho</option>
                        <option value="Hembra"   @if($animal->sex == "Hembra" ) selected @endif>Hembra</option>
                  </select>
                </div> 
                <div  class="col-md-6">
                    <label for="">Etapa:</label>
                    <select class="form-control" id="inputPassword4" name="stage"  value="{{$animal->stage}}">
                        <option selected>...</option>
                        <option value="Vaca"   @if($animal->stage == "Vaca" ) selected @endif>Vaca</option>
                        <option value="Toro"   @if($animal->stage == "Toro" ) selected @endif>Toro</option>
                        <option value="Ternero"   @if($animal->stage == "Ternero" ) selected @endif>Ternero</option>
                        <option value="Vaquilla"   @if($animal->stage == "Vaquilla" ) selected @endif>Vaquilla</option>
                        <option value="Novillo"   @if($animal->stage == "Novillo" ) selected @endif>Novillo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Origen:</label>
                    <select class="form-control" id="inputPassword4" name="source" value="{{$animal->source}}">
                        <option selected>...</option>
                        <option value="Nacido"   @if($animal->source == "Nacido" ) selected @endif>Nacido</option>
                        <option value="Comprado"   @if($animal->source == "Comprado" ) selected @endif>Comprado</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Edad-Meses:</label>
                    <input type="int" class="form-control" id="proveedor" name="age_month" value="{{$animal->age_month}}">
                </div>
                <div  class="col-md-6">
                    <label for="">Estado de Salud:</label>
                    <select class="form-control" id="inputPassword4" name="health_condition" value="{{$animal->health_condition}}">
                        <option selected>...</option>
                        <option value="Sano"   @if($animal->health_condition == "Sano" ) selected @endif>Sano</option>
                        <option value="Enfermo"   @if($animal->health_condition == "Enfermo" ) selected @endif>Enfermo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Embarazo:</label>
                    <select class="form-control" id="inputPassword4" name="gestation_state" value="{{$animal->gestation_state}}">
                        <option selected>...</option>
                        <option value="Si"  @if($animal->gestation_state == "Si" ) selected @endif>Si</option>
                        <option value="No"  @if($animal->gestation_state == "No" ) selected @endif>No</option>
                  </select>
                </div>

                <div  class="col-md-6">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$animal->actual_state}}">
                        <option selected>...</option>
                        <option value="Disponible" @if($animal->actual_state == "Disponible" ) selected @endif>Disponible</option>
                        <option value="Vendido"    @if($animal->actual_state == "Vendido" ) selected @endif>Vendido</option>
                        <option value="Inactivo"   @if($animal->actual_state == "Inactivo" ) selected @endif>Inactivo</option>
                        <option value="Reproduccion"  @if($animal->actual_state == "Reproduccion" ) selected @endif>Reproduccion</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Ubicación:</label>
                    <select class="form-control" id="" name="location_id"   value="{{$animal->location_id}}">
                            <option>Seleccione la Ubicacion</option>
                        @foreach ($ubicacion as $i )   
                            <option value="{{$i->id}}" @if($animal->location_id == $i->id ) selected @endif >{{$i->location_d}}</option>
                        @endforeach
                    </select>

                </div> 
                <div class="col-md-6">
                    <label for="">Concebedido:</label>
                    <select class="form-control" id="inputPassword4" name="conceived" value="{{$animal->conceived}}">
                        <option selected>...</option>
                        <option value="Monta"   @if( $animal->conceived == "Monta") selected @endif >Monta</option>
                        <option value="Insiminacion Artificial"   @if( $animal->conceived == "Insiminacion Artificial") selected @endif>Insiminacion Artificial</option>
                        <option value="Embrional"   @if( $animal->conceived == "Embrional") selected @endif>Embrional</option>
                  </select>
                </div>
                <div class="col-md-6-self-center" style="margin: 80px">
                    
                        <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaAnimal')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaAnimal') }}" >Guardar</button>
  
                </div>
            </form>
        </div>
    </div>
    
    @endsection
    @section('js')
    @endsection
</body>