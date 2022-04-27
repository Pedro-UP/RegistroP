<style>
    .img-redonda {
        width: 200px;
        height: 200px;
        border-radius: 150px;
    }

    .contenedor {
        padding-top: 30px;
        padding-bottom: 80px;
        padding-right: 50px;
        padding-left: 40px;
        border: 1px solid black;
        background-color: azure;
    }

</style>
<x-guest-layout>
    <x-jet-authentication-card>

        <section class="contenedor">

            <x-slot name="logo">
                <img src="imagenes/logopc.jfif" class="img-redonda" width="200" height="40" alt="">
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordar contraseña') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste la contraseña?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('INICIAR') }}
                    </x-jet-button>
                </div>
            </form>
        </section>
    </x-jet-authentication-card>
</x-guest-layout>
