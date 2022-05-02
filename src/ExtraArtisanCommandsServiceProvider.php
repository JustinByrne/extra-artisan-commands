<?php

namespace JustinByrne\ExtraArtisanCommands;

use JustinByrne\ExtraArtisanCommands\Commands\CreateUserCommand;
use JustinByrne\ExtraArtisanCommands\Commands\MakeActionCommand;
use JustinByrne\ExtraArtisanCommands\Commands\MakeServiceCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("extra-artisan-commands")
            ->hasConfigFile()
            ->hasCommand(CreateUserCommand::class)
            ->hasCommand(MakeServiceCommand::class)
            ->hasCommand(MakeActionCommand::class);
    }
}
