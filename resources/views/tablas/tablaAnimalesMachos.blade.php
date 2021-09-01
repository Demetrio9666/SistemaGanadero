@extends('tablas.base')
@section('tabla')
<table id="tablaHembra" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr> 
            <th>#</th>
            <th>Código Animal</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Sexo</th> 
            <th>Acción</th> 
        </tr>
    </thead>
    <tbody>
        
        @foreach ($animalMacho as $i)          
        <tr>
            <td class="col1">{{$i->id}}</td>
            <td class="col2">{{$i->animalCode}}</td>
            <td class="col3">{{$i->age_month}}</td>
            <td class="col4">{{$i->raza}}</td>
            <td class="col5">{{$i->sex}}</td>
            
            <td> <center><button type="button" class="btn btn-success btn   btselectHembra"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button></center> </td>
            
            </tr>
        @endforeach        
        
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Código Animal</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Sexo</th> 
            <th>Acción</th> 
        </tr>
    </tfoot>
</table>
@endsection
