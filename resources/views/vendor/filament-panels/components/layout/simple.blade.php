@php
use Filament\Support\Enums\MaxWidth;
@endphp

<x-filament-panels::layout.base :livewire="$livewire">
@props([
    'after' => null,
    'heading' => null,
    'subheading' => null,
])

<div class="flex flex-col items-center min-h-screen fi-simple-layout">
    @if (filament()->auth()->check())
        <div
            class="absolute top-0 flex items-center h-16 end-0 gap-x-4 pe-4 md:pe-6 lg:pe-8"
        >
            @if (filament()->hasDatabaseNotifications())
                @livewire(Filament\Livewire\DatabaseNotifications::class, ['lazy' => true])
            @endif

            <x-filament-panels::user-menu />
        </div>
    @endif

    <div
        class="flex items-center justify-center flex-grow w-full fi-simple-main-ctn"
    >
            {{ $slot }}
    </div>

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::footer') }}
</div>
</x-filament-panels::layout.base>
