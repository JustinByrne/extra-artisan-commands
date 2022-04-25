<?php

namespace JustinByrne\ExtraArtisanCommands;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JustinByrne\ExtraArtisanCommands\Commands\ExtraArtisanCommandsCommand;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('extra-artisan-commands')
            ->hasConfigFile()
            ->hasCommand(ExtraArtisanCommandsCommand::class);
        
        if (config("extra-artisan-commands.is_user")) {
            $package->hasCommand(CreateUserCommand::class);
        }
    }
}
