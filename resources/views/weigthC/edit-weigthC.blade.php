@extends('adminlte::page')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>
   
    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
    @endsection
    @section('content_header')
    <div class="container" id="registration-form">
        @include('messages.message')
        <div class="image"></div>
        <div class="frm">
            <h1>Editar de  Control de Peso </h1>
            <form action="{{route('controlPeso.update',$pesoC->id)}}"   method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date" value="{{$pesoC->date}}">
                </div>
                <div class="form-group">
                    <label for="" class="">Código Animal</label>
                        <div class="input-group mb-3">
                                <button class="btn btn-outline-info" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimal" >Buscar</button>
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text"   aria-label="Example text with button addon" aria-describedby="button-addon1"  id="codigo_animal" disabled=disabled 
                                @foreach ($animal as $i)
                                            @if ($pesoC->animalCode_id == $i->id )
                                                 value ="{{$i->animalCode}}"
                                            @endif
                                @endforeach>
                               
                                <input type="hidden" id="idcodi" name="animalCode_id" value="{{$pesoC->animalCode_id}}">
                                
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Peso KG:</label>
                    <input type="text" class="form-control" id="peso" name="weigtht" value="{{$pesoC->weigtht}}" onChange="ValidarPeso(this.value)">
                </div>
                
                <div class="form-group">
                    <label for="">Fecha de próximo control:</label>
                    <input type="date" class="form-control" id="fecha_r" name="date_r" value="{{$pesoC->date_r}}">
                </div>
                <div  class="form-group">
                    <label for="">Estado Actual:</label>
                    <select class="form-control" id="inputPassword4" name="actual_state" value="{{$pesoC->actual_state}}">
                        <option value="Disponible" @if( $pesoC->actual_state == "Disponible") selected @endif>Disponible</option>
                            <option value="Inactivo" @if( $pesoC->actual_state == "Inactivo") selected @endif>Inactivo</option>
                     </select>
                </div> 
                    
                <div class="form-group">
                    <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/controlPeso')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/controlPeso') }}" >Guardar</button>
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
           function ValidarPeso(id){
            peso = document.getElementById("peso").value;
            var RE = /^\d*(\.\d{1})?\d{0,1}$/;
            if(RE.test(peso) ){
                return true;
            }else{
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'FORMATO NO ACEPTADO EJEMPLO: 00.00 ',
                        
                    }) 
                return false;
            }
        }
   </script>
    @endsection
</body>