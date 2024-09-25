<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresidentResource\Pages;
use App\Filament\Resources\PresidentResource\RelationManagers;
use App\Models\Commune;
use App\Models\Neighborhood;
use App\Models\President;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresidentResource extends Resource
{
    protected static ?string $model = President::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Presidents';
    protected static ?string $navigationGroup = 'Eglises';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            
                Section::make('Mandat')
                ->columns(3)
                ->schema([

                    Select::make('leadership_status')
                    ->label('Statut de leadership')
                    ->options([
                        'active' => 'Actif',
                        'inactive' => 'Inactif',
                    ]),
                
                DatePicker::make('leadership_start_date')
                    ->label('Début du mandat'),
    
                DatePicker::make('leadership_end_date')
                    ->label('Fin du mandat'),
                ]),

          
            
                Section::make('Identité')
                ->columns()

                ->schema([
                    Forms\Components\TextInput::make('firstName')
                        ->label("Prénoms")
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('lastName')
                        ->label("Nom")
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('user_type')
                            ->label('Role')
                            ->default('president')
                            ->readOnly(),
            
                    Forms\Components\Select::make('community_id')
                            ->label("Communautée")
                            ->relationship("community",'sigle')
                         ,
                
                    MarkdownEditor::make('pastoral_experience')
                         ->label('Expérience pastorale')
                         ->columnSpanFull()
                         ->placeholder('Entrez votre expérience pastorale ici...'),
                ]),
            

             
              
                
             
             
             Section::make('Contact Electronique')
             ->columns(2)
             ->schema([
                 
             Forms\Components\TextInput::make('email')
                 ->email()
                 ->required()
                 ->maxLength(255),
                
                        
                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->maxLength(255),
                ]),
            Section::make('Localisation')
                ->columns()
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
                    
                    Select::make('neighborhood_id')
                        ->options(fn(Get $get)=>Neighborhood::query()
                            ->where("commune_id",$get('commune_id'))
                            ->pluck('name','id')
                        )
                        ->searchable()
                        ->preload()
                        ->label('Quartier')

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
        
            Tables\Columns\TextColumn::make('user_type')
                ->label('Role')
                ->searchable(),
            
            Tables\Columns\TextColumn::make('community.sigle')
                ->label("Communautée")
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
            'index' => Pages\ListPresidents::route('/'),
            'create' => Pages\CreatePresident::route('/create'),
            'view' => Pages\ViewPresident::route('/{record}'),
            'edit' => Pages\EditPresident::route('/{record}/edit'),
        ];
    }
}
