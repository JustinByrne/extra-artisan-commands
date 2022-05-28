<?php

namespace JustinByrne\ExtraArtisanCommands\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    public $signature = "create:user";

    public $description = "Create new user";

    public function handle(): int
    {
        $user = [];
        $validation = [];

        foreach (
            config("extra-artisan-commands.user_fields")
            as $field => $type
        ) {
            if ($type == "password") {
                $user[$field] = Hash::make($this->secret($field));
                $validation[$field] = ["required"];
            } else {
                $user[$field] = $this->ask($field);
                $validation[$field] = ["required", $type];
            }
        }

        $validator = Validator::make($user, $validation);

        if ($validator->fails()) {
            $this->warn("User not created. See error messages below:");

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::create($user);

        $this->info("User $user->name was created.");

        return self::SUCCESS;
    }
}
