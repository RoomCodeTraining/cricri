<x-filament-panels::page>
    <form wire:submit.prevent="fetchData" class="mb-4">
        <div class="flex gap-4">
            <x-filament::input type="date" wire:model="startDate" label="Date de début" />
            <x-filament::input type="date" wire:model="endDate" label="Date de fin" />
            <x-filament::input type="text" wire:model="searchTerm" placeholder="Rechercher..." label="Recherche" />

            <x-filament::button type="submit" class="ml-2">
                Filtrer
            </x-filament::button>
        </div>
    </form>

    @if($consummedData->isNotEmpty())
        <x-filament::button class="w-full bg-blue-500 text-white mb-4" wire:click="export">
            Exporter
        </x-filament::button>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Nombre d'attestation</th>
                    <th class="px-4 py-2">Détails</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consummedData as $index => $result)
                    <tr>
                        <td class="border px-4 py-2">{{ $result->int_name }}</td>
                        <td class="border px-4 py-2">{{ number_format($result->total_stock_edite, 0, '', ' ') }}</td>
                        <td class="border px-4 py-2">
                            <button
                                class="bg-gray-300 px-2 py-1 rounded"
                                wire:click="toggleDetails({{ $index }})">
                                {{ $expandedRows[$index] ?? false ? '-' : '+' }}
                            </button>
                        </td>
                    </tr>

                    @if($expandedRows[$index] ?? false)
                        <tr>
                            <td colspan="3" class="border px-4 py-2">
                                <strong>Détails :</strong>
                                <ul>
                                    @foreach(json_decode($result->details) as $detail)
                                        <li>{{ $detail->f1 }} : {{ number_format($detail->f2, 0, '', ' ') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun résultat trouvé.</p>
    @endif
</x-filament-panels::page>
