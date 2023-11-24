<x-guest-layout>
    <div class="mb-4 text-center text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña?') }}
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('No hay problema. Solo necesitamos que nos proporciones tu dirección de correo electrónico corporativo y te enviaremos un enlace para restablecer tu contraseña que te permitirá elegir una nueva. Recuerda, esta página está destinada para el uso de los miembros autorizados del personal de nuestra empresa.') }}
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            
            <x-link 
                :href="route('login')"
            >
                Iniciar sesión
            </x-link>
            
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar Correo') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
