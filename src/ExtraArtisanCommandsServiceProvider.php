<?php

namespace JustinByrne\ExtraArtisanCommands;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JustinByrne\ExtraArtisanCommands\Commands\ExtraArtisanCommandsCommand;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('extra-artisan-commands')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_extra-artisan-commands_table')
            ->hasCommand(ExtraArtisanCommandsCommand::class);
    }
}
