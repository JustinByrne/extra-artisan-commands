<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Create new user command
    |--------------------------------------------------------------------------
    |
    | Choosing if the create:user command is enabled.
    |
    */
    "is_user" => true,

    /*
    |--------------------------------------------------------------------------
    | Create new user fields
    |--------------------------------------------------------------------------
    |
    | The fields that are needed to create a new user, add or remove as
    | required.
    |
    */
    "user_fields" => [
        "name" => "string",
        "email" => "email",
        "password" => "password",
    ],
];
