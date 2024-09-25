<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChurchResource\Pages;
use App\Filament\Resources\ChurchResource\RelationManagers;
use App\Models\Church;
use App\Models\Commune;
use App\Models\Neighborhood;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Eglises';
    protected static ?string $modelLabel = 'Eglise';
    protected static ?string $navigationGroup = 'Eglises';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Détails')
                ->columns(2)
                ->schema([
                    TextInput::make('temple')
                        ->label("Temple")
                        ->required()
                        ->maxLength(255),
                    
                    TextInput::make('name')
                        ->label("Nom de l'église")
                        ->required()
                        ->maxLength(255),
                    ]),
                Section::make('Identites')
                ->columns()
                ->schema([
                    
                    Select::make('pastor_id')
                        ->relationship('pastor','name')
                        ->searchable()
                        ->label('Pasteur Principale')
                        ->preload(),
                    
                    Select::make('community_id')
                        ->relationship('community', 'name')
                        ->searchable()
                        ->label('Communauté')
                        ->preload(),
                ]),


                Section::make()
                    ->schema([
                            SpatieMediaLibraryFileUpload::make('logo')
                                ->label('Logo')
                                ->required()
                                ->image()
                                ->imageEditor()
                                ->openable()
                                ->columnSpanFull(),
                            SpatieMediaLibraryFileUpload::make('pictures')
                                ->required()
                                ->multiple()
                                ->reorderable()
                                ->image()
                                ->imageEditor()
                                ->openable()
                                ->columnSpanFull()
            
                            ]),
                 Section::make('Addresses Electronniques')
                    ->columns(3)
                    ->schema([
                            TextInput::make('contacts')
                                ->maxLength(255),
                            
                            TextInput::make('email')
                                ->email()
                                ->maxLength(255),
                            TextInput::make('website')
                                    ->maxLength(255),
                                    ]),
                    Section::make("Localisation Géographique")
                    ->columns(3)
                    ->schema([
                        Select::make('city_id')
                            ->label('Ville')
                            ->preload()
                            ->searchable()
                            ->relationship('city','name')
                            ->live()
                        ,
    
                        Select::make('commune_id')
                            ->label('Commune')
                            ->options(fn (Get $get) =>Commune::query()
                                ->where('city_id', $get('city_id'))
                                ->pluck('name','id'))
                            ->preload()
                            ->searchable()
                            ->live()
                        ,
                    
                        Select::make('neighborhood_id')
                            ->label('Quartier')
                            ->options(fn (Get $get) =>Neighborhood::query()
                                ->where('commune_id', $get('commune_id'))
                                ->pluck('name','id'))
                            ->preload()
                            ->searchable()
                            ->live()
                        ,
    
                        TextInput::make('address')
                            ->label('Adresse')
                            ->maxLength(255),
                        
                        TextInput::make('latitude')
                            ->numeric(),
    
                        TextInput::make('longitude')
                            ->numeric(),
                        
                    ]),

                Section::make("Détails")
                    ->schema([
                        MarkdownEditor::make('description')
                        ->columnSpanFull(),
                       
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pastor.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('community.sigle')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                SpatieMediaLibraryImageColumn::make('media')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('contacts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
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
            'index' => Pages\ListChurches::route('/'),
            'create' => Pages\CreateChurch::route('/create'),
            'view' => Pages\ViewChurch::route('/{record}'),
            'edit' => Pages\EditChurch::route('/{record}/edit'),
        ];
    }
}
