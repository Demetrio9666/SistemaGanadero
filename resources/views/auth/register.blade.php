
<link rel="stylesheet" type="text/css" href="css/styles1.css">
<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}">
<link href="{{asset('../vendor/fontawesome-free/css/fontawesome.min.css')}}">

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="contenedor">
            <div class="image"></div>
            <div class="letra">
                <h1 class="titulo"><strong>SoftGanadoBOVINO</strong></h1>
            </div>
            
        </div>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nombre y Apellido</label>
                <x-jet-input id="name" class="block mt-1 w-full {{$errors->has('name') ? 'is-invalid':''}}" type="text" name="name" :value="old('name')"  />
                @error('name')
                    <div class="invalid-feedback" style="color:#FF0000;"><i>{{$message}}</i></div>
                @enderror
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <!--x-jet-label for="email" value="{{ __('Correo electrónico') }}" /-->
                <x-jet-input id="email" class="block mt-1 w-full {{$errors->has('email') ? 'is-invalid':''}}" type="email" name="email" :value="old('email')"  />
                @error('email')
                    <div class="invalid-feedback" style="color:#FF0000;"><i>{{$message}}</i></div>
                @enderror
            </div>

            <!--div class="form-group">
                <label>Contraseña</label>
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full {{$errors->has('password') ? 'is-invalid':''}}"   />
                
            </div-->
            <div class="form-group">
                <label>Contraseña</label>
                <div class="input-group mb-3">
                    <x-jet-input id="password"  class="form-control {{$errors->has('password') ? 'is-invalid':''}}"  aria-label="Recipient's username" aria-describedby="button-addon2" type="password" name="password" />
                   
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" id="button-addon2" onclick="mostrarContrasena()"  >Mostar</button>
                    </div>
                  </div>
                  @error('password')
                        <div class="invalid-feedback" style="color:#FF0000;"><i>{{$message}}</i></div>
                  @enderror
            </div>
            

            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <!--x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" /-->
                <x-jet-input id="password_confirmation" class="block mt-1 w-full {{$errors->has('password_confirmation') ? 'is-invalid':''}}" type="password" name="password_confirmation"  />
                @error('password_confirmation')
                    <div class="invalid-feedback" style="color:#FF0000;"><i>{{$message}}</i></div>
                @enderror
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="form-group">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Yá esta registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
  </script>
