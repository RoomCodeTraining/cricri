{{-- <x-filament-panels::page.simple> --}}
<div>

    <header class="py-8 fi-simple-header">
        <h1 class="text-2xl font-bold tracking-tight fi-header-heading text-gray-950 sm:text-3xl">
            Mon Profile
        </h1>
        <p class="mt-2 text-sm text-left text-gray-500 fi-simple-header-subheading">
            {{-- Je gère mon profile utilisateur ici --}}
        </p>
    </header>

    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}

        <x-filament-panels::form.actions :actions="$this->getCachedFormActions()" :full-width="$this->hasFullWidthFormActions()" alignment="right" />
    </x-filament-panels::form>
</div>
{{-- </x-filament-panels::page.simple> --}}
