<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Agregar Banner principal') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Sube una nueva imagen para la presentación.") }}
        </p>
    </header>

    <form wire:submit.prevend='crearBanner' class="mt-6 space-y-6">   
    
        <div>
            <x-input-label for="titulo" :value="__('Título')" />
            <x-text-input id="titulo" wire:model="titulo" type="text" class="mt-1 block w-full" :value="old('titulo')" autofocus />
            @error('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="sub_titulo" :value="__('Sub-título')" />
            <x-text-input id="sub_titulo" wire:model="sub_titulo" type="text" class="mt-1 block w-full" :value="old('sub_titulo')" />
            @error('sub_titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
        
        <div class="mt-5">
            <x-input-label for="image" :value="__('Imagen')" />          
            <input id="imagen" class="block mt-1 w-full text-sm text-gray-600" type="file" wire:model="imagen" accept="image/*" />
            @error('imagen')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="m-5 mt-5">
            @if ($imagen)
                <p class="text-sm text-gray-400">Preview:</p>
                <img src="{{ $imagen->temporaryUrl() }}" class="flex justify-center w-96">
            @endif
        </div>
    
        <div>
            <x-primary-button>
                Agregar Banner
            </x-primary-button>
        </div>
    </form>    
</section>
