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
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Registro de Animales</h1>
            <form action="{{route('fichaAnimal.store')}}" method="POST" class="row g-3">
                @csrf
                <div  class="col-md-6">
                    <label for="" class="form-label">Codigo Animal:</label>
                    <input type="text" class="form-control" id="codigoAnimal" name="animalCode" >
                </div>
                <div  class="col-md-6">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_n" name="date_n">
                </div>
                <div  class="col-md-6">
                    <label for="">Raza:</label>
                    <select class="form-control" id="razas" name="race_id">
                            <option> Seleccione la Raza</option>
                        @foreach ( $raza as $i )   
                            <option value="{{$i->id}}">{{$i->description}}</option>
                        @endforeach
                    </select>

                </div> 
                <div  class="col-md-6">
                    <label for="">Sexo:</label>
                    <select class="form-control" id="inputPassword4" name="sex">
                        <option selected>...</option>
                        <option>Macho</option>
                        <option>Hembra</option>
                  </select>
                </div> 
                <div  class="col-md-6">
                    <label for="">Etapa de vida:</label>
                    <select class="form-control" id="inputPassword4" name="stage">
                        <option selected>...</option>
                        <option>Vaca</option>
                        <option>Toro</option>
                        <option>Ternero</option>
                        <option>Vaquilla</option>
                        <option>Novillo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Origen:</label>
                    <select class="form-control" id="inputPassword4" name="source">
                        <option selected>...</option>
                        <option>Nacido</option>
                        <option>Comprado</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Edad-Meses:</label>
                    <input type="int" class="form-control" id="proveedor" name="age_month">
                </div>
                <div  class="col-md-6">
                    <label for="">Estado de Salud:</label>
                    <select class="form-control" id="inputPassword4" name="health_condition">
                        <option selected>...</option>
                        <option>Sano</option>
                        <option>Enfermo</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Embarazo:</label>
                    <select class="form-control" id="inputPassword4" name="gestation_state">
                        <option selected>...</option>
                        <option>Si</option>
                        <option>No</option>
                  </select>
                </div>

                <div  class="col-md-6">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state">
                        <option selected>...</option>
                        <option>Disponible</option>
                        <option>Vendido</option>
                        <option>Faenado o Descarte</option>
                        <option>Reproduccion</option>
                  </select>
                </div>
                <div  class="col-md-6">
                    <label for="">Ubicacion:</label>
                    <select class="form-control" id="" name="location_id">
                            <option>Seleccione la Ubicacion</option>
                        @foreach ($ubicacion as $i )   
                            <option value="{{$i->id}}">{{$i->location_d}}</option>
                        @endforeach
                    </select>

                </div> 
                <div class="col-md-6">
                    <label for="">Concebedido o creado:</label>
                    <select class="form-control" id="inputPassword4" name="conceived">
                        <option selected>...</option>
                        <option>Monta</option>
                        <option>Insiminacion Artificial</option>
                        <option>Embrional</option>
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