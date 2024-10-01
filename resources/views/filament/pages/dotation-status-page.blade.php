<x-filament-panels::page>
    <form wire:submit.prevent="fetchData" class="mb-4">
        <div class="flex gap-4">
            <x-filament::input type="date" wire:model="startDate" label="Date de début" />
            <x-filament::input type="date" wire:model="endDate" label="Date de fin" />
            <x-filament::input type="text" wire:model="searchTerm" placeholder="Rechercher..." label="Recherche" />

                <x-filament::input.select
                    wire:model="selectedNature"
                    label="Nature"
                >
                    <option value="">Sélectionner une nature</option>
                    @foreach($natures as $nature)
                        <option value="{{ $nature }}">{{ $nature }}</option>
                    @endforeach
                </x-filament::input.select>

            <x-filament::button type="submit" class="ml-2">
                Filtrer
            </x-filament::button>
        </div>
    </form>

    @if($datationData->isNotEmpty())
        <x-filament::button class="w-full bg-blue-500 text-white mb-4" wire:click="export">
            Exporter
        </x-filament::button>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">DATE</th>
                    <th class="px-4 py-2">INTERMEDIAIRE</th>
                    <th class="px-4 py-2">COULEUR</th>
                    <th class="px-4 py-2">OPERATION</th>
                    <th class="px-4 py-2">PLAGE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datationData as $result)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ \Carbon\Carbon::parse($result->date_creation)->format('d-m-Y') }}
                        </td>
                        <td class="border px-4 py-2">{{ $result->int_name }}</td>
                        <td class="border px-4 py-2">{{ $result->nature }}</td>
                        <td class="border px-4 py-2">{{ $result->type_operation }}</td>
                        <td class="border px-4 py-2">{{ number_format($result->plage,'0','',' ') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun résultat trouvé.</p>
    @endif
</x-filament-panels::page>
