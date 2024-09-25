<?php

namespace App\Filament\Resources\PasteurResource\Pages;

use App\Filament\Resources\PasteurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPasteur extends EditRecord
{
    protected static string $resource = PasteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
