<?php

namespace JustinByrne\ExtraArtisanCommands;

use JustinByrne\ExtraArtisanCommands\Commands\ActionMakeCommand;
use JustinByrne\ExtraArtisanCommands\Commands\EnumMakeCommand;
use JustinByrne\ExtraArtisanCommands\Commands\ServiceMakeCommand;
use JustinByrne\ExtraArtisanCommands\Commands\TraitMakeCommand;
use JustinByrne\ExtraArtisanCommands\Commands\UserCreateCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ExtraArtisanCommandsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("extra-artisan-commands")
            ->hasConfigFile()
            ->hasCommand(ActionMakeCommand::class)
            ->hasCommand(EnumMakeCommand::class)
            ->hasCommand(ServiceMakeCommand::class)
            ->hasCommand(TraitMakeCommand::class)
            ->hasCommand(UserCreateCommand::class);
    }
}
