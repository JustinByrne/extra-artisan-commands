<?php

namespace JustinByrne\ExtraArtisanCommands;

use JustinByrne\ExtraArtisanCommands\Commands\CreateUserCommand;
use JustinByrne\ExtraArtisanCommands\Commands\ExtraArtisanCommandsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('extra-artisan-commands')
            ->hasConfigFile()
            ->hasCommand(ExtraArtisanCommandsCommand::class)
            ->hasCommand(CreateUserCommand::class);
    }
}
