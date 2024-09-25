<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Commune;
use App\Models\Neighborhood;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Administrateurs';
    protected static ?string $modelLabel = 'Staff';
    protected static ?string $navigationGroup = 'Utilisateurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\TextInput::make('type')
                    ->label('Role')
                    ->readOnly()
                    ->default("admin")
                    ->maxLength(255)
                    ->columnSpanFull(),
               
                Section::make("Identités")
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('firstName')
                        ->label('Prénoms')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lastName')
                        ->label('Nom')
                        ->maxLength(255),
                    ]),

                    Section::make("Localisation")
                    ->columns()
                    ->schema([
                            
                        Forms\Components\Select::make('city_id')
                            ->label('Ville')
                            ->preload()
                            ->searchable()
                            ->relationship('city','name')
                            ->live()
                            ,
    
                        Forms\Components\Select::make('commune_id')
                            ->label('Commune')
                            ->options(fn (Get $get) =>Commune::query()
                                ->where('city_id', $get('city_id'))
                                ->pluck('name','id'))
                            ->preload()
                            ->searchable()
                            ->live(),
                        
                        Forms\Components\Select::make('neighborhood_id')
                            ->label('Quartier')
                            ->options(fn (Get $get) =>Neighborhood::query()
                                ->where('commune_id', $get('commune_id'))
                                ->pluck('name','id'))
                            ->preload()
                            ->searchable()
                            ->live(),
    
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255),
                        ]),
                    
                Section::make("Contacts")
                ->columns()
                ->schema([
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->label("Numéro de téléphone")
                        ->maxLength(255),
                    ]),

               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                Tables\Columns\TextColumn::make('firstName')
                    ->label('Prénoms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastName')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('commune.name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('profile_photo_path')
                //         ->searchable(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            // 'view' => Pages\ViewStaff::route('/{record}'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
