<?php

namespace JustinByrne\ExtraArtisanCommands;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JustinByrne\ExtraArtisanCommands\Commands\MakeEnumCommand;
use JustinByrne\ExtraArtisanCommands\Commands\MakeTraitCommand;
use JustinByrne\ExtraArtisanCommands\Commands\CreateUserCommand;
use JustinByrne\ExtraArtisanCommands\Commands\MakeActionCommand;
use JustinByrne\ExtraArtisanCommands\Commands\MakeServiceCommand;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("extra-artisan-commands")
            ->hasConfigFile()
            ->hasCommand(CreateUserCommand::class)
            ->hasCommand(MakeServiceCommand::class)
            ->hasCommand(MakeActionCommand::class)
            ->hasCommand(MakeTraitCommand::class)
            ->hasCommand(MakeEnumCommand::class);
    }
}
