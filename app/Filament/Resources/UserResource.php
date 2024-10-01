<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Commune;
use App\Models\Utilisateur;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = Utilisateur::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Utilisateurs';
    protected static ?string $modelLabel = 'Utilisateur';
    protected static ?string $navigationGroup = 'Utilisateurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identité')
                    ->columns()

                    ->schema([
                        Forms\Components\TextInput::make('firstName')
                            ->label("Prénoms")
                            ->maxLength(255),

                        Forms\Components\TextInput::make('lastName')
                            ->label("Nom")
                            ->maxLength(255),
                    ]),



                Forms\Components\TextInput::make('type')
                    ->label('Role')
                    ->default('user')
                    ->readOnly(),

                Forms\Components\Select::make('church_id')
                    ->label("Eglise")
                    ->relationship("church",'name')
                 ,



                 Section::make('Contacts')
                 ->schema([

                 Forms\Components\TextInput::make('email')
                     ->email()
                     ->required()
                     ->maxLength(255),


                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                    ]),
                Section::make('localisation')
                    ->columns(3)
                    ->schema([


                        Select::make('city_id')
                            ->relationship('city','name')
                            ->searchable()
                            ->live()
                            ->preload()
                            ->label('Ville')

                            ,

                        Select::make('commune_id')
                            ->options(fn(Get $get)=>Commune::query()
                            ->where("city_id",$get('city_id'))
                            ->pluck('name','id'))
                            ->searchable()
                            ->label('Commune')

                            ->preload()
                            ,


                        Forms\Components\TextInput::make('address')
                        ->maxLength(255),

                ]),

                Section::make('Medias')
                ->collapsible()

                ->schema([
                        SpatieMediaLibraryFileUpload::make('media')
                        ->required()
                        ->multiple()
                        ->reorderable()
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->columnSpanFull()

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom complet')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Role')
                    ->searchable(),

                Tables\Columns\TextColumn::make('commune.name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                    SpatieMediaLibraryImageColumn::make('media')
                    ->label('Profile')
                    ,

                Tables\Columns\TextColumn::make('phone')
                    ->label('Numéro de téléphone')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
