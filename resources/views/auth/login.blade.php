<head>
	<!--Made with love by Mutiullah Samim -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	 <!--Bootsrap 4 CDN-->
 
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 
	 <!--Fontawesome CDN-->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 
	 <!--Custom styles-->
	 
	 <link rel="stylesheet" type="text/css" href="css/styles1.css">
 </head>
<body>
	
	<x-guest-layout>
		<div class="fixed top-0 right-0 px-6 py-4 sm:block">
			<!--a href="{{ route('register') }}" class="ml-4 text-sm text-gray-900 underline">Registrarse</a-->
			<a  class="btn btn-success " style="margin: 10px" id="button-addon1" href="{{ route('register') }}" >Registrar</a>
			
		</div>
		  
			<x-jet-validation-errors class="mb-4" />
			
			@if (session('status'))
				<div class="mb-4 font-medium text-sm text-green-600">
					{{ session('status') }}
				</div>
			@endif
			
			<div class="contenedor">
				<div class="image"></div>
				<div class="letra">
					<h1 class="titulo"><strong>SoftGanadoBOVINO</strong></h1>
				</div>
				
			</div>
				
			
			<div class="container">
				
				<div class="d-flex justify-content-center h-100">
			
					<div class="card">
						
						
						<div class="card-header">
							<h3>Iniciar</h3>
							<div class="d-flex justify-content-end social_icon">
								<span><i class="fas fa-user"></i></span>
							</div>
						</div>
						<div class="card-body">
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="input-group form-group">
					
									<div class="input-group-prepend">
										<span class="input-group-text" for="email" value="{{ __('Email') }}"><i class="fas fa-envelope"></i></span>
									</div>
									<input class="form-control"  id="email" placeholder="correo electrónico" type="email" name="email" :value="old('email')" required autofocus>
								</div>
					
								<div class="input-group form-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="password" for="password" value="{{ __('Password') }}"><i class="fas fa-key"></i></span>
									</div>
									<input type="password" class="form-control" placeholder="contraseña" type="password" name="password" required autocomplete="current-password">
								</div>
					
								<div class="row align-items-center remember">
									<label for="remember_me" class="flex items-center">
										<x-jet-checkbox id="remember_me" name="remember" />
										<span >{{ __('Recordar') }}</span>
									</label>
								</div>
					
								<div class="flex items-center justify-end mt-4">
									@if (Route::has('password.request'))
										<!--a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
											{{ __('Forgot your password?') }}
										</a-->
									@endif
									<x-jet-button class="ml-4">
										{{ __('Iniciar') }}
									</x-jet-button>
								</div>
							</form>
	
						</div>
						<div class="card-footer">
							<div class="d-flex justify-content-center links">

							</div>
							

						</div>
	
	
					</div>
				</div>
				
	
			</div>
		
	</x-guest-layout>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

