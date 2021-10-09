@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/imagenbusqueda1.css">
@endsection
@section('content_header')
       
<center>
  <div style="margin-top: 19px; ">
      <div class="card" style="width: 200px; height:200px">
          <div id="imagenPreview"  >
             <img src=" {{$imagen}}" id="imagenAct">
          </div>
      </div>
  </div>
            
</center>
 
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Raza</th>
                <th scope="col">Sexo</th>
                <th scope="col">Etapa</th>
                <th scope="col">Origen</th>
                <th scope="col">Edad-meses</th>
                <th scope="col">Cant. Partos</th>
                <th scope="col">Estado Actual</th> 
            </tr>
        </thead>
        <tbody>  
                 
            <tr>
                <td>{{$codigoA}}</td>
                <td>{{$fecha}}</td>
                <td>{{$raza}}</td>
                <td>{{$sexo}}</td>
                <td>{{$etapa}}</td>
                <td>{{$origen}}</td>
                <td>{{$edad}}</td>
                <td>{{$par}}</td>
                <td>{{$estado}}</td>
              
            </tr>
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>
  
<div class="row">
  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Fichas de Reproducción Artificial</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="Artificial" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>
  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Tipos Reproducción Artificial</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="ArtificialTipo" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>
  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Ficha de Reproducción Natural Interno</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="natural" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>

  <section section class="col-lg-6 connectedSortable">
    <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
             Ficha de Reproducción Natural Externo</h3>
  
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="externo" style="height:330px; min-height:430px"></canvas>
          </div>
       </div>
  
    </div>
   
  </section>
</div>
<div class="card">
  <div class="card-body">
    <div class="titulo "><h1> Control de Vacunaciones</h1></div>
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha de la Vacunación</th>
                <th scope="col">Vacuna</th>
            </tr>
        </thead>
        <tbody>  
          @foreach ($vacunaC as $i)  
          <tr>
            <td >{{$i->animal}}</td>
            <td>{{$i->date}}</td>
            <td >{{$i->vacuna}}</td>
          </tr>
          @endforeach    
            
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>

<div class="card">
  <div class="card-body">
    <div class="titulo "><h1>Control de Desparasitaciones</h1></div>
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha de la desparasitación</th>
                <th scope="col">Desparasitante</th>
            </tr>
        </thead>
        <tbody>  
          @foreach ($desC as $i)  
          <tr>
            <td >{{$i->animal}}</td>
            <td>{{$i->date}}</td>
            <td >{{$i->des}}</td>
          </tr>
          @endforeach    
            
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>

<div class="card">
  <div class="card-body">
    <div class="titulo "><h1>Control de  Pesos</h1></div>
    <div class="table-responsive">
      <table class="table">
        <thead>            
            <tr>
                <th scope="col">Código Animal</th>
                <th scope="col">Fecha del control</th>
                <th scope="col">Desparasitante</th>
            </tr>
        </thead>
        <tbody>  
          @foreach ($pesoC as $i)  
          <tr>
            <td >{{$i->animal}}</td>
            <td>{{$i->date}}</td>
            <td >{{$i->weigtht}}</td>
          </tr>
          @endforeach    
            
           
        </tbody>
    </table>
    </div>
    
  </div>
  
</div>

<center>
  <a type="submit" class="btn btn-primary btn" href="{{url('/dashboard-busqueda')}}" >Regresar</a>
</center>



    
@endsection
@section('js')
<script type="text/javascript" src="{{asset('Chartjs/Chart.js')}}"></script>
<script>

  //////////7
  var ctx = document.getElementById('Artificial').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas2; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Artificial',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(121, 12, 246, 1)',
                  'rgba(0, 170, 252, 1)',
                  
              ],
           
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  ///////////
  var ctx = document.getElementById('ArtificialTipo').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas3; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Pajuela', 'Hembrional'],
          datasets: [{
              label: 'Tipos de reproducción Artificial',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(121, 12, 246, 1)',
                  
                  
              ],
           
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  //////
  var ctx = document.getElementById('natural').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas4; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Natural Interno',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(121, 12, 246, 1)',
                  'rgba(255, 168, 255, 0.93)',
                  'rgba(234, 246, 101, 0.93)',
                  
                  
              ],
           
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  //////
  var ctx = document.getElementById('externo').getContext('2d');
  var cData = JSON.parse(`<?php echo $datas5; ?>`)
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Exitosos', 'Fallido', 'Espera'],
          datasets: [{
              label: 'Reproducción Natural Externo',
              data: cData,
              backgroundColor: [
                  'rgba(12, 45, 246, 0.97)',
                  'rgba(255, 168, 255, 0.93)',
                  'rgba(234, 246, 101, 0.93)',
                  
                  
              ],
           
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
@endsection






    
    
   


