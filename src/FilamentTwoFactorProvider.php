<?php

namespace Webbingbrasil\FilamentTwoFactor;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webbingbrasil\FilamentTwoFactor\Http\Livewire\Auth;
use Webbingbrasil\FilamentTwoFactor\Http\Livewire\TwoFactorAuthenticationForm;

class FilamentTwoFactorProvider extends PackageServiceProvider
{
    public static string $name = 'filament-2fa';

    public function packageBooted(): void
    {
        Livewire::component('auth-login', Auth\Login::class);
        Livewire::component('auth-two-factor-challenge', Auth\TwoFactorChallenge::class);
        Livewire::component('filament-two-factor-form', TwoFactorAuthenticationForm::class);
    }

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasTranslations()
            ->hasRoute('web')
            ->hasMigration('add_two_factor_columns_to_users_table');
    }
}
