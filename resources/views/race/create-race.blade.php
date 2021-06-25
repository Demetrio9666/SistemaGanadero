<head>
    <link href="{{asset('css/app.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Registration Form</title>
        

  </head>
  <body>
    @extends('adminlte::page')
  
    @section('title')
  
    @section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
	
	 <!--Bootsrap 4 CDN-->
 
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 
	 <!--Fontawesome CDN-->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="/css/conf.css">
    @endsection
  
    @section('content_header')

        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                
                <form action="{{route('confRaza.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de la Raza:</label>
                        <input type="text" class="form-control" id="raza" name="description" >
                    </div>
                    <div class="form-group">
                        <label for="">Porcentaje:</label>
                        <input type="int" class="form-control" id="porcentaje" name="percentage">
                    </div>
                    
                    <div class="form-group">
                        <a type="submit" class="btn btn-secondary btn-lg" href="{{url('/confRaza')}}" >Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg"  href="{{ Redirect::to('/confRaza') }}" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    
    
   
    @endsection
  
  
    @section('js')

    @endsection
  </body>