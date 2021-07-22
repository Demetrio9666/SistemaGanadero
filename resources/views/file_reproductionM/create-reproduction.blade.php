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
        @include('messages.message')
        <div class="image"></div>
        <div class="frm">
            <h1>Ficha de Reproducción por Monta Interna</h1>
            <form action="{{route('fichaReproduccionM.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" >
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled >

                                <span class="input-group-text" id="basic-addon1">Raza</span>
                                <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled >

                                <input type="hidden" id="idcodi" name="animalCode_id_m">
                    
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Edad:</label>
                                    <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled >
                                </div>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Sexo:</label>
                                    <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled>
                                </div>
                        </div>

                </div>

                <div class="form-group"  id="monta_interna">
                    <h1>Reproducción por Monta Interna</h1>
                    <br>
                    
                        <div class="input-group mb-3">
                                <input type="hidden" id="idcodi2" name="animalCode_id_p">
                                <div  class="col-md-6">
                                    <label>Codigo Animal:</label>
                                    <input type="text" class="form-control" id="codigo_animal2"  disabled=disabled >
                                </div>
                                <div  class="col-md-6">
                                    <label>Raza:</label>
                                    <input type="text" class="form-control" id="raza2"  disabled=disabled >
                                </div>


                                <div  class="col-md-6">
                                    <label>Edad:</label>
                                    <input type="text" class="form-control" id="edad2" name="age_month" disabled=disabled >
                                </div>
                                <div  class="col-md-6">
                                    <label >Sexo:</label>
                                    <input type="text" class="form-control" id="sexo2" name="sex" disabled=disabled>
                                </div>
                              
                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                              <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Codigo Animal</th>
                                        <th>Raza</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Acción</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($animalRM as $i)          
                                      <tr>
                                          <td>{{$i->id}}</td>
                                          <td>{{$i->animalCode}}</td>
                                          <td>{{$i->race_d}}</td>
                                          <td>{{$i->age_month}}</td>
                                          <td>{{$i->sex}}</td>
                                          <td> <button type="button" class="btn btn-success btn   btselect2"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></td>
                                          
                                        </tr>
                                      @endforeach        
                                </tbody>
                            </table>
                            </div>
                        </div>
                </div>

                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state">
                        <option value="Disponible">Disponible</option>
                        <option value="Inactivo">Inactivo</option>
                     </select>
                </div>
                
                <div class="col-md-8-self-center" style="margin: 80px" >
                    <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaReproduccionM')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaReproduccionM') }}" >Guardar</button>
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

   </script>
    @endsection
</body>