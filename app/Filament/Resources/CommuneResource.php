<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommuneResource\Pages;
use App\Filament\Resources\CommuneResource\RelationManagers;
use App\Models\Commune;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommuneResource extends Resource
{
    protected static ?string $model = Commune::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Communes';
    protected static ?string $modelLabel = 'Commune';
    protected static ?string $navigationGroup = 'Addresses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nom de commune')
                    ->maxLength(255),

                Forms\Components\Select::make('city_id')
                    ->relationship('city','name')
                    ->preload()
                    ->searchable()
                    ->label('Ville'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom de commune'),

                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->label('Ville'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCommunes::route('/'),
            // 'create' => Pages\CreateCommune::route('/create'),
            // 'view' => Pages\ViewCommune::route('/{record}'),
            // 'edit' => Pages\EditCommune::route('/{record}/edit'),
        ];
    }
}
