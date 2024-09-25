<?php

namespace App\Filament\Resources\PasteurResource\Pages;

use App\Filament\Resources\PasteurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasteurs extends ListRecords
{
    protected static string $resource = PasteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
