<?php

namespace JustinByrne\ExtraArtisanCommands\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JustinByrne\ExtraArtisanCommands\ExtraArtisanCommands
 */
class ExtraArtisanCommands extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'extra-artisan-commands';
    }
}
