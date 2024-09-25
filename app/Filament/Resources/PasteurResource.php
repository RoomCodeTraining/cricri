<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasteurResource\Pages;
use App\Filament\Resources\PasteurResource\RelationManagers;
use App\Models\Pasteur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasteurResource extends Resource
{
    protected static ?string $model = Pasteur::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $navigationLabel = 'Pasteurs';
    protected static ?string $navigationGroup = 'Eglises';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasteurs::route('/'),
            'create' => Pages\CreatePasteur::route('/create'),
            'view' => Pages\ViewPasteur::route('/{record}'),
            'edit' => Pages\EditPasteur::route('/{record}/edit'),
        ];
    }
}
