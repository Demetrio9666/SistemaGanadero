@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
            <link href="{{asset('css/app.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
            <link rel="stylesheet" type="text/css" href="/css/registroR.css">
            <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.bootstrap4.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('datatables/responsive.bootstrap4.min.css')}}">
    @endsection
    <title>Registration Form</title>
</head>
<body>
    @section('content_header')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Ficha de Reproducción</h1>
            <form action="{{route('fichaReproduccion.update', $re->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$re->date_r}}">
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <input type="hidden" id="idcodi" name="animalCode_id_m"  value="{{$re->animalCode_id_m}}">

                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animalR as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->animalCode}} "
                                        @endif
                                @endforeach >

                                <span class="input-group-text" id="basic-addon1">Raza</span>
                                <input type="text"  aria-label="Example text with button addon" aria-describedby="button-addon1"  id="raza" disabled=disabled 
                                @foreach ($animalR as $i)
                                        @if ($re->animalCode_id_m == $i->id )
                                            value =" {{$i->race_d}} "
                                        @endif
                                @endforeach >

                                <div  class="col-md-6">
                                    <label for="" class="form-label">Edad:</label>
                                    <input type="text" class="form-control" id="edad" name="age_month" disabled=disabled 
                                    @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_m == $i->id )
                                                value =" {{$i->age_month}} "
                                            @endif
                                    @endforeach>
                                </div>
                                <div  class="col-md-6">
                                    <label for="" class="form-label">Sexo:</label>
                                    <input type="text" class="form-control" id="sexo" name="sex" disabled=disabled  @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_m == $i->id )
                                                value =" {{$i->sex}} "
                                            @endif
                                    @endforeach>
                                </div>
                        </div>

                </div>
                

                <div class="form-group">
                    <input type="hidden" id="idcodi2" name="animalCode_id_p"    value="{{$re->animalCode_id_p}}">
                    <input type="hidden" id="idcodi_ar" name="artificial_id"    value="{{$re->artificial_id}}">
                    <label for="inputEmail4" class="form-label">Tipo de Reproduccion</label>
                    <select class="form-control" id="inputPassword4" name="estado" onChange="mostrar(this.value)">
                      <option  id="0">seleccione</option>
                      <option id="Monta Interna"  @if($re->artificial_id == "" ) @endif selected  >Monta Interna</option>
                      <option id="Reproduccion Artificial" @if($re->animalCode_id_p == "" ) @endif selected>Artificial</option>
                </select>
                </div>

                
                <div class="form-group"  id="monta_interna"   value="{{$re->animalCode_id_p}}">
                    <h1>Reproducción por Monta Interna</h1>
                    
                     <a type="button" class="btn btn-success" style="margin: 10px, color:#FFFFFF;" id="button-addon1" >Limpiar</a>
                         <div class="input-group mb-3">
                                <input type="hidden" id="idcodi2" name="animalCode_id_p"    value="{{$re->animalCode_id_p}}">
                                <div  class="col-md-6">
                                    <label>Codigo Animal:</label>
                                    <input type="text" class="form-control" id="codigo_animal2"  disabled=disabled 
                                     @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_p == $i->id )
                                                value =" {{$i->animalCode}} "
                                            @endif
                                    @endforeach >
                                </div>
                                <div  class="col-md-6">
                                    <label>Raza:</label>
                                    <input type="text" class="form-control" id="raza2"  disabled=disabled 
                                    @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_p == $i->id )
                                                value =" {{$i->race_d}} "
                                            @endif
                                    @endforeach >
                                </div>


                                <div  class="col-md-6">
                                    <label>Edad:</label>
                                    <input type="text" class="form-control" id="edad2" name="age_month" disabled=disabled  
                                    @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_p == $i->id )
                                                value =" {{$i->age_month}} "
                                            @endif
                                    @endforeach  >
                                </div>
                                <div  class="col-md-6">
                                    <label >Sexo:</label>
                                    <input type="text" class="form-control" id="sexo2" name="sex" disabled=disabled 
                                    @foreach ($animalR as $i)
                                            @if ($re->animalCode_id_p == $i->id )
                                                value =" {{$i->sex}} "
                                            @endif
                                    @endforeach>
                                </div>
                              
                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                              <table id="table1" class="table table-striped table-bordered" style="width:100%">
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
                                      @foreach ($animalR as $i)          
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

                

                <div class="form-group"  id="reproduccion_ar"   value="{{$re->artificial_id}}">
                    <h1>Reproducción Artificial</h1>
                    <br>
                        <div class="input-group mb-3 ">
                                
                                <input type="hidden" id="idcodi_ar" name="artificial_id"    value="{{$re->artificial_id}}">
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
                              <table id="table2" class="table table-striped table-bordered" style="width:100%">
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


                
                <div class="col-md-8-self-center" style="margin: 80px" >
                    <a type="submit" class="btn btn-secondary btn-lg"   href="{{url('/fichaReproduccion')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  style="margin: 10px" href="{{ Redirect::to('/fichaReproduccion') }}" >Guardar</button>
                </div>

            </form>

            
        </div>
    </div>
    @include("modal.modalAnimalesR")
    
    @endsection
    @section('js')
    
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/dataTables.sweetalert2@11.min.js')}}"></script>
    
    <script>
        $('#modalanimal').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
      });

      
         $('#table1').DataTable({
           responsive: true,
    
           "language": {
                "lengthMenu": "Mostrar "+
                `<select class="custom-select custom-selec-s form-control form-control-s">
                        <option value = '10' >10</option> 
                        <option  value = '25' >25</option>
                        <option  value = '50' >50</option>
                        <option  value = '100' >100</option>
                        <option  value =  '-1'>All</option>
                </select>`
                +" Registro por Pagina",
                "zeroRecords": "Resultados No encontrados -Disculpe",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de  _MAX_ Registros Totales)",
                'search': "Buscar:",
                'paginate':{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            }
         });

         $('#table2').DataTable({
           responsive: true,
    
           "language": {
                "lengthMenu": "Mostrar "+
                `<select class="custom-select custom-selec-s form-control form-control-s">
                        <option value = '10' >10</option> 
                        <option  value = '25' >25</option>
                        <option  value = '50' >50</option>
                        <option  value = '100' >100</option>
                        <option  value =  '-1'>All</option>
                </select>`
                +" Registro por Pagina",
                "zeroRecords": "Resultados No encontrados -Disculpe",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de  _MAX_ Registros Totales)",
                'search': "Buscar:",
                'paginate':{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            }
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

   </script>
    @endsection
</body>