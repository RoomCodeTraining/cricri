<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\DatePicker;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class EditProfile extends BaseEditProfile
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Mon Profile';

    protected static string $view = 'filament.pages.auth.edit-profile';
    protected static string $layout = 'filament-panels::components.layout.index';

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }
    public static function getSlug(): string
    {
        return static::$slug ?? 'my-profile';
    }

    public static function getLabel(): string
    {
        return "Mon profile";
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Informations Personnelles")
                    ->aside()
                    ->schema([

                        TextInput::make('first_name')->label('Prénom'),
                        TextInput::make('last_name')->label('Nom de famille'),

                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        Select::make('role')
                            ->label('Rôle')
                            ->searchable()
                            ->preload()
                            ->options([
                                'admin' => 'Administrateur',
                                'stock' => "Gestionneur de Stock"
                            ]),

                        SpatieMediaLibraryFileUpload::make('profile')
                            ->imageEditor()
                            ->collection('profile')
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('signature')
                            ->imageEditor()
                            ->collection('signature')
                            ->columnSpanFull(),

                        TextInput::make('responsibility')->label('Responsabilité'),
                        TextInput::make('position')->label('Poste'),
                        TextInput::make('department')->label('Département'),
                        TextInput::make('registration_number')->label('Numéro d\'enregistrement'),
                        DatePicker::make('birth_date')->label('Date de naissance'),


                    ]),

            ]);
    }
}
