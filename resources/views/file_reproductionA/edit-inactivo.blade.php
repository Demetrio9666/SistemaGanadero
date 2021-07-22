@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
            <link rel="stylesheet" type="text/css" href="/css/registroR.css">
    @endsection
    <title>Registration Form</title>
</head>
<body>
    @section('content_header')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Ficha de Reproducción Artificial</h1>
            <form action="{{route('inactivos.fichaReproduccionA.update', $re->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{$re->date}}" disabled=disabled>
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <input type="hidden" id="idcodi" name="animalCode_id_m"  value="{{$re->animalCode_id_m}}">

                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animalRH as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->animalCode}} "
                                        @endif
                                @endforeach >

                                <span class="input-group-text" id="basic-addon1">Raza</span>
                                <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                                @foreach ($animalRH as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->race_d}} "
                                        @endif
                                @endforeach >

                                <div  class="col-md-6">
                                    <label for="" class="form-label">Edad:</label>
                                    <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled 
                                    @foreach ($animalRH as $i)
                                            @if ($re->animalCode_id_m == $i->id )
                                                value =" {{$i->age_month}} "
                                            @endif
                                    @endforeach>
                                </div>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Sexo:</label>
                                    <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled  
                                    @foreach ($animalRH as $i)
                                            @if ($re->animalCode_id_m == $i->id )
                                                value =" {{$i->sex}} "
                                            @endif
                                    @endforeach>
                                </div>
                        </div>

                </div>
                

                <div class="form-group"  id="reproduccion_ar"   >
                    <h1>Reproducción Artificial</h1>
                    <br>
                        <div class="input-group mb-3 ">
                                
                                <input type="hidden" id="idcodi_ar" name="artificial_id"    value="{{$re->artificial_id}}" disabled=disabled>
                                <div class="col-md-6">
                                        <label>Raza:</label>
                                        <input type="text" class="form-control" disabled=disabled id="raza3" 
                                        @foreach ($arti as $i)
                                                @if ($re->artificial_id == $i->id )
                                                    value =" {{$i->race_d}} "
                                                @endif
                                         @endforeach >
                                </div>

                                <div class="col-md-6">
                                        <label>Tipo de Material Genetico:</label>
                                        <input type="text" class="form-control" disabled=disabled id="material3" 
                                        @foreach ($arti as $i)
                                                @if ($re->artificial_id == $i->id )
                                                    value =" {{$i->reproduccion}} "
                                                @endif
                                        @endforeach>
                                </div>

                                <div class="col-md-6">
                                        <label>Nombre del Proveedor:</label>
                                        <input type="text" class="form-control" disabled=disabled id="proveedor3" 
                                        @foreach ($arti as $i)
                                                @if ($re->artificial_id == $i->id )
                                                    value =" {{$i->supplier}} "
                                                @endif
                                        @endforeach >
                                </div>

                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                              <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Raza</th>
                                        <th>Tipo de Material Genetico</th>
                                        <th>Proveedor</th>
                                        <th>Acción</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($arti as $i)          
                                      <tr>
                                          <td>{{$i->id}}</td>
                                          <td>{{$i->race_d}}</td>
                                          <td>{{$i->reproduccion}}</td>
                                          <td>{{$i->supplier}}</td>
                                          <td> <button type="button" class="btn btn-success btn-lg   btselect3"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>
                                          
                                        </tr>
                                      @endforeach        
                                </tbody>
                            </table>
                            </div>
                        </div>         
        
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$re->actual_state}}">
                        <option value="Disponible" @if( $re->actual_state == "Disponible") selected @endif>Disponible</option>
                        <option value="Inactivo" @if( $re->actual_state == "Inactivo") selected @endif>Inactivo</option>
                     </select>
                </div>
            

                
                <div class="col-md-8-self-center" style="margin: 80px" >
                    <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('inactivos/fichaReproduccionA')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('inactivos/fichaReproduccionA') }}" >Guardar</button>
                </div>

            </form>

            
        </div>
    </div>
    @include("modal.modalAnimalesR")
    
    @endsection
    @section('js')
    
    <script>
        $('#modalanimal').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
      });

      
        
           $(".btselect").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();
                var col5=currentRow.find("td:eq(4)").text();
                
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
                $("#raza").val(col3);
                $("#edad").val(col4);
                $("#sexo").val(col5);
           });

           $(".btselect2").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();
                var col5=currentRow.find("td:eq(4)").text();
                
                $("#idcodi2").val(col1);
                $("#codigo_animal2").val(col2);
                $("#raza2").val(col3);
                $("#edad2").val(col4);
                $("#sexo2").val(col5);
           });
           $(".btselect3").on('click',function(){
                var currentRow = $(this).closest("tr");
                var col1=currentRow.find("td:eq(0)").text();
                var col2=currentRow.find("td:eq(1)").text();
                var col3=currentRow.find("td:eq(2)").text();
                var col4=currentRow.find("td:eq(3)").text();

                
                $("#idcodi_ar").val(col1);
                $("#raza3").val(col2);
                $("#material3").val(col3);
                $("#proveedor3").val(col4);
                
           });

           function mostrar(id) {
                if (id == "Monta Interna") {
                     $("#monta_interna").show();
                     $("#reproduccion_ar").show();
        
                }else if(id == "Artificial"){
                    $("#reproduccion_ar").show();
                    
                    
                }
            }



            
            $(".btnlimpiar").on('click',function(){
                $('#animalCode_id_p').val('');

            });
   </script>
    @endsection
</body>