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
            <h1>Editar Control de vacunacion </h1>
            <form action="{{route('controlPrenes.update',$pre->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Vacunacion:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_c" value="{{$pre->date_c}}">
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Código</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animal as $i)
                                            @if ($pre->animalCode_id == $i->id )
                                                 value =" {{$i->animalCode}} "
                                            @endif
                                @endforeach>
                               
                               
                                <input type="hidden" id="idcodi" name="animalCode_id" value="{{$pre->animalCode_id}}">
                                
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="vitamin_id"   value="{{$pre->vitamin_id}}">
                        <option selected>Seleccione la Vitamina</option>
                        @foreach ($vitamina as $i )   
                            <option value="{{$i->id}}" @if($pre->vitamin_id == $i->id ) selected @endif>{{$i->vitamin}}</option>
                            
                        @endforeach
                  </select>
                </div>  
 
                <div class="form-group">
                    <label for="">Alternativa 1 de Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="alternative1"   value="{{$pre->alternative1}}">
                        <option selected>N/A</option>
                        @foreach($vitamina as $i )   
                        <option {{$i->id}}  @if($pre->alternative1 == $i->vitamin ) value= "{{$i->vitamin}}"  selected  @endif>{{$i->vitamin}}</option>
                            
                        @endforeach
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Alternativa 2 de Vitamina:</label>
                    <select class="form-control" id="inputPassword4"  name="alternative2"   value="{{$pre->alternative2}}">
                        <option selected>N/A</option>
                        @foreach ($vitamina as $i )   
                        <option {{$i->id}}  @if($pre->alternative2 == $i->vitamin ) value= "{{$i->vitamin}}" selected  @endif>{{$i->vitamin}}</option>
                            
                        @endforeach
                  </select>
                </div>  
                <div class="form-group">
                    <label for="">Observación:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observation">{{$pre->observation}}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Fecha de próximo control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_rc" value="{{$pre->date_rc}}">
                </div>
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/controlPrenes')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/controlPrenes') }}" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @include("modal.modalAnimales")
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
                $("#idcodi").val(col1);
                $("#codigo_animal").val(col2);
           });

          
          
        

   </script>
    @endsection
</body>