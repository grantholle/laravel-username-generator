<?php

namespace GrantHolle\Username;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use GrantHolle\Username\Commands\UsernameCommand;

class UsernameServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-username-generator')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(UsernameCommand::class);
    }
}
