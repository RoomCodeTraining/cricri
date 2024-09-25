<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityResource\Pages;
use App\Filament\Resources\CommunityResource\RelationManagers;
use App\Models\Commune;
use App\Models\Community;
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

class CommunityResource extends Resource
{
    protected static ?string $model = Community::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Communautés';
    protected static ?string $modelLabel = 'Communautée';
    protected static ?string $navigationGroup = 'Eglises';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Identites')
                ->columns(2)
                    ->schema([
                        TextInput::make('sigle')->required(),

                        Select::make('president_id')
                        ->relationship('president','name')
                        ->searchable()
                        ->label('President')
                        ->preload()
    
                       ,
                        TextInput::make('name')
                                ->required()
                                ->columnSpanFull()
                                ->label('Nom de la communauté')
                                ->maxLength(255),
                    

                    ]),
                Section::make()
                    ->schema([
                                SpatieMediaLibraryFileUpload::make('media')
                                ->required()
                                ->image()
                                ->imageEditor()
                                ->openable()
                                ->columnSpanFull()
            
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

                    TextInput::make('location')
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

                    MarkdownEditor::make('history')
                        ->label("Historique")
                        ->columnSpanFull(),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('sigle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('president.name')
                    ->numeric()
                    ->sortable(),
                SpatieMediaLibraryImageColumn::make('media')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('commune.name')
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
            'index' => Pages\ListCommunities::route('/'),
            'create' => Pages\CreateCommunity::route('/create'),
            'view' => Pages\ViewCommunity::route('/{record}'),
            'edit' => Pages\EditCommunity::route('/{record}/edit'),
        ];
    }
}
