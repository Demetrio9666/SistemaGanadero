<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full {{$errors->has('name') ? 'is-invalid':''}}" type="text" name="name" :value="old('name')"  />
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full {{$errors->has('email') ? 'is-invalid':''}}" type="email" name="email" :value="old('email')"  />
                @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full {{$errors->has('password') ? 'is-invalid':''}}" type="password" name="password"  />
                @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full {{$errors->has('password_confirmation') ? 'is-invalid':''}}" type="password" name="password_confirmation"  />
                @error('password_confirmation')
                    <div class="invalid-feedback">{{$message}}</div>
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
                    {{ __('Ya esta registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
