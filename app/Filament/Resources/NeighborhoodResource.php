<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NeighborhoodResource\Pages;
use App\Filament\Resources\NeighborhoodResource\RelationManagers;
use App\Models\Neighborhood;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NeighborhoodResource extends Resource
{
    protected static ?string $model = Neighborhood::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Quartiers';
    protected static ?string $modelLabel = 'Quartier';
    protected static ?string $navigationGroup = 'Addresses';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('commune_id')
                    ->preload()
                    ->searchable()
                    ->relationship('commune','name')
                    ->label('Commune')
                    ->required()
                    ,
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nom de quartier')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de quartier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('commune.name')
                    ->label('Commune')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('commune.city.name')
                    ->label('Ville')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListNeighborhoods::route('/'),
            // 'create' => Pages\CreateNeighborhood::route('/create'),
            // 'view' => Pages\ViewNeighborhood::route('/{record}'),
            // 'edit' => Pages\EditNeighborhood::route('/{record}/edit'),
        ];
    }
}
