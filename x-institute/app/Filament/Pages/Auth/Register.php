<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class Register extends BaseRegister
{
    protected ?string $maxWidth = '4xl';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Profile')
                        ->icon('heroicon-o-user')
                        ->description('Tell us about yourself.')
                        ->schema([
                            $this->getNameFormComponent(),
                            TextInput::make('nic')
                                ->label('NIC')
                                ->unique('users', 'nic')
                                ->placeholder('NIC')
                                ->required(),
                        ]),
                    Wizard\Step::make('Contact')
                        ->icon('heroicon-o-phone')
                        ->description('How can we reach you?')
                        ->schema([
                            TextInput::make('phone')
                                ->label('Phone')
                                ->placeholder('Phone')
                                ->required(),
                            TextInput::make('address')
                                ->label('Address')
                                ->placeholder('Address')
                                ->required(),
                        ]),
                    Wizard\Step::make('Account')
                        ->icon('heroicon-o-key')
                        ->description('Create your account.')
                        ->schema([
                            $this->getEmailFormComponent(),
                            $this->getPasswordFormComponent(),
                            $this->getPasswordConfirmationFormComponent(),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        wire:submit="register"
                    >
                        Register
                    </x-filament::button>
                    BLADE
                ))),
            ]);
    }

    protected function getFormActions(): array
    {
        return [];
    }

    protected function handleRegistration(array $data): Model
    {
        $user = parent::handleRegistration([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'nic' => $data['nic'],
        ]);

        return $user;
    }

}
