<?php

namespace JustinByrne\ExtraArtisanCommands\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JustinByrne\ExtraArtisanCommands\ExtraArtisanCommandsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JustinByrne\\ExtraArtisanCommands\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ExtraArtisanCommandsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_extra-artisan-commands_table.php.stub';
        $migration->up();
        */
    }
}
