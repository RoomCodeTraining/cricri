<?php

namespace App\Filament\Resources\PasteurResource\Pages;

use App\Filament\Resources\PasteurResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPasteur extends ViewRecord
{
    protected static string $resource = PasteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
