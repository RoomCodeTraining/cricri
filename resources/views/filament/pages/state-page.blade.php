<x-filament-panels::page>
    <x-filament::card>
        Bienvenue {{ Auth::user()->name }}, de chez la compagnie {{Auth::user()->organization->name}}

    </x-filament::card>

    <x-filament::card>
        @livewire(StatsOverview::class)
    </x-filament::card>

</x-filament-panels::page>
