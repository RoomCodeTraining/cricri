<x-filament-panels::page>
        <form wire:submit.prevent="fetchData" class="mb-4">
            <div class="flex gap-4">
                <x-filament::input type="text" wire:model="searchTerm" placeholder="Rechercher..." label="Recherche" />

                <x-filament::button type="submit" class="ml-2">
                    Filtrer
                </x-filament::button>
            </div>
        </form>
        @if(!empty($provisionData))

            <x-filament::button class="w-full bg-blue-500 text-white mb-4" wire:click="export">
                EXPORTER
            </x-filament::button>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ENTITE</th>
                        <th class="px-4 py-2">DOTATION</th>
                        <th class="px-4 py-2">STOCK RESTANT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provisionData as $result)
                        <tr>

                            <td class="border px-4 py-2">{{ $result['entity'] }}</td>
                            <td class="border px-4 py-2">{{ number_format($result['dotation']['total'],'0','',' ') }}</td>
                            <td class="border px-4 py-2">{{ number_format($result['stock']['total'],'0','',' ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun résultat trouvé.</p>
        @endif
    </x-filament-panels::page>

