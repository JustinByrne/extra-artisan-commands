<?php

namespace JustinByrne\ExtraArtisanCommands\Commands;

use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    public $signature = 'create:user';

    public $description = 'Create new user';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
