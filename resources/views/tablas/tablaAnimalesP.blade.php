@extends('tablas.base')
@section('tabla')
<table id="tabla" class="table table-striped table-bordered" style="width:100%">
  <thead>
      <tr> 
          <th>#</th>
          <th>Código Animal</th>
          <th>Fecha Nacimiento</th>
          <th>Sexo</th>
          <th>Edad</th>
          <th>Embarazo</th>
          <th>Acción</th> 
      </tr>
  </thead>
  <tbody>
      
        @foreach ($animalP as $i)          
        <tr>
            <td class="col1">{{$i->id}}</td>
            <td class="col2">{{$i->animalCode}}</td>
            <td>{{$i->date}}</td>
            <td>{{$i->sex}}</td>
            <td>{{$i->age_month}}</td>
            <td>{{$i->gestation_state}}</td>
            <td><center><button type="button" class="btn btn-success btn-lg   btselect"  data-dismiss="modal"><i class="fas fa-check-circle"></i></button> </center> </td>
            
          </tr>
        @endforeach        
       
  </tbody>
  <tfoot>
      <tr>
          <th>#</th>
          <th>Código Animal</th>
          <th>Fecha Nacimiento</th>
          <th>Sexo</th>
          <th>Edad</th>
          <th>Embarazo</th>
          <th>Acción</th>
      </tr>
  </tfoot>
</table>
@endsection

  
    
  
  
  