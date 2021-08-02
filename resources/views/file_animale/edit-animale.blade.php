@extends('adminlte::page')
<head>
   
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
   
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/registrop.css">
    <link rel="stylesheet" type="text/css" href="/css/imagen.css">
    @endsection
    @section('content_header')
    @include('messages.message')
    <div class="card card-dark">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Editar Registro de Animales</h3>
            </div>
                <div class="container" id="registration-form">
                    <div class="image"></div>
                    <div class="frm">
                        <form action="{{route('fichaAnimal.update', $animal->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <center>
                                <div style="margin-top: 19px; ">
                                    <div class="card " style="width: 200px">
                                        <div id="imagenPreview"  >
                                          
                                                <img src=" {{$animal->url}}" id="imagenAct">
                                            
                                        </div>
                                </div>
                                  
                                    <input class= "form-control form-control-sm"  id="imagen" type="file" name="file" > 
                                    <input type="text" value="{{$animal->url}}">
                                    
                                   
                               
                                           
                             </center>
                            <div  class="col-md-6">
                                <label for="" class="form-label">Código Animal:</label>
                                <input type="text" class="form-control" id="codigoAnimal" name="codigo_animal" value="{{$animal->animalCode}}" onblur="upperCase()">
                            </div>
                            <div  class="col-md-6">
                                <label for="">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="fecha_n" name="fecha_nacimiento"  value="{{$animal->date}}">
                            </div>
                            <div  class="col-md-6">
                                <label for="">Raza:</label>
                                <select class="form-control" id="razas" name="raza"  value="{{$animal->race_id}}">
                                        <option selected></option>
                                    @foreach ( $raza as $i )   
                                        <option value="{{$i->id}}" @if($animal->race_id == $i->id ) selected @endif>{{$i->race_d}}</option>
                                    @endforeach
                                </select>

                            </div> 
                            <div  class="col-md-6">
                                <label for="">Sexo:</label>
                                <select class="form-control" id="inputPassword4" name="sexo" value="{{$animal->sex}}">
                                    <option selected></option>
                                    <option value="MACHO"   @if($animal->sex == "MACHO" ) selected @endif>MACHO</option>
                                    <option value="HEMBRA"   @if($animal->sex == "HEMBRA" ) selected @endif>HEMBRA</option>
                            </select>
                            </div> 
                            <div  class="col-md-6">
                                <label for="">Etapa:</label>
                                <select class="form-control" id="inputPassword4" name="etapa"  value="{{$animal->stage}}" >
                                    <option selected></option>
                                    <option value="TERNERA" @if($animal->stage == "TERNERA") selected @endif>TERNERA</option>
                                    <option value="VACONILLA" @if($animal->stage == "VACONILLA" ) selected @endif>VACONILLA </option>
                                    <option value="VACA"   @if($animal->stage == "VACA" ) selected @endif>VACA</option>
                                    <option value="TORO"   @if($animal->stage == "TORO" ) selected @endif>TORO</option>
                                    <option value="TORETE" @if($animal->stage == "TORETE")selected @endif >TORETE</option>
                                    <option value="TERNERO"   @if($animal->stage == "TERNERO" ) selected @endif>TERNERO</option>
                                    <option value="VAQUILLA"   @if($animal->stage == "VAQUILLA" ) selected @endif>VAQUILLA</option>
                                    <option value="NOVILLO"   @if($animal->stage == "NOVILLO" ) selected @endif>NOVILLO</option>
                            </select>
                            </div>
                        
                            <div  class="col-md-6">
                                <label for="">Origen:</label>
                                <select class="form-control" id="inputPassword4" name="origen" value="{{$animal->source}}">
                                    <option selected></option>
                                    <option value="NACIDO"   @if($animal->source == "NACIDO" ) selected @endif>NACIDO</option>
                                    <option value="COMPRADO"   @if($animal->source == "COMPRADO" ) selected @endif>COMPRADO</option>
                            </select>
                            </div>
                            <div  class="col-md-6">
                                <label for="">Edad-Meses:</label>
                                <input type="int" class="form-control" id="proveedor" name="edad" value="{{$animal->age_month}}">
                            </div>
                            <div  class="col-md-6">
                                <label for="">Estado de Salud:</label>
                                <select class="form-control" id="inputPassword4" name="estado_de_salud" value="{{$animal->health_condition}}">
                                    <option selected></option>
                                    <option value="SANO"   @if($animal->health_condition == "SANO" ) selected @endif>SANO</option>
                                    <option value="ENFERMO"   @if($animal->health_condition == "ENFERMO" ) selected @endif>ENFERMO</option>
                            </select>
                            </div>
                            <div  class="col-md-6">
                                <label for="">Embarazo:</label>
                                <select class="form-control" id="inputPassword4" name="estado_de_gestacion" value="{{$animal->gestation_state}}">
                                    <option selected></option>
                                    <option value="SI"  @if($animal->gestation_state == "SI" ) selected @endif>SI</option>
                                    <option value="NO"  @if($animal->gestation_state == "NO" ) selected @endif>NO</option>
                            </select>
                            </div>

                            
                            <div  class="col-md-6">
                                <label for="">Ubicación:</label>
                                <select class="form-control" id="" name="localizacion"   value="{{$animal->location_id}}">
                                        <option></option>
                                    @foreach ($ubicacion as $i )   
                                        <option value="{{$i->id}}" @if($animal->location_id == $i->id ) selected @endif >{{$i->location_d}}</option>
                                    @endforeach
                                </select>

                            </div> 
                            <div class="col-md-6">
                                <label for="">Concebedido:</label>
                                <select class="form-control" id="inputPassword4" name="concebido" value="{{$animal->conceived}}">
                                    <option selected></option>
                                    <option value="MONTA"   @if( $animal->conceived == "MONTA") selected @endif >MONTA</option>
                                    <option value="INSIMINACIÓN ARTIFICIAL"   @if( $animal->conceived == "INSIMINACIÓN ARTIFICIAL") selected @endif>INSIMINACIÓN ARTIFICIAL</option>
                                    <option value="EMBRIONAL"   @if( $animal->conceived == "EMBRIONAL") selected @endif>EMBRIONAL</option>
                            </select>
                            </div>

                            <div  class="col-md-6">
                                <label for="">Estado Actual:</label>
                                <select class="form-control" id="inputPassword4" name="actual_state" value="{{$animal->actual_state}}">
                                    <option selected></option>
                                    <option value="DISPONIBLE" @if($animal->actual_state == "DISPONIBLE" ) selected @endif>DISPONIBLE</option>
                                    <option value="VENDIDO"    @if($animal->actual_state == "VENDIDO" ) selected @endif>VENDIDO</option>
                                    <option value="INACTIVO"   @if($animal->actual_state == "INACTIVO" ) selected @endif>INACTIVO</option>
                                    <option value="REPRODUCIÓN"  @if($animal->actual_state == "REPRODUCIÓN" ) selected @endif>REPRODUCIÓN</option>
                            </select>
                            </div>
                            <center>
                                    <div class="col-md-6-self-center" style="margin: 40px">
                                        
                                            <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaAnimal')}}">Cancelar</a>
                                            <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaAnimal') }}" >Guardar</button>
                    
                                    </div>
                            </center>
                        </form>
                    </div>
                </div>
    </div>
    
    @endsection
    @section('js')
    <script>
          function upperCase() {
                var x=document.getElementById("codigoAnimal").value
                document.getElementById("codigoAnimal").value=x.toUpperCase()
            }
           

            document.getElementById("imagen").onchange=function(e){
                let reader= new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                reader.onload=function(){
                    let imagenPreview=document.getElementById("imagenPreview");
                        image=document.createElement("img");
                        image.src=reader.result;

                        imagenPreview.innerHTML='';
                        imagenPreview.append(image);

                }
            }
    </script>
    @endsection
</body>