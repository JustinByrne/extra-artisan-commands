<?php

beforeEach(function () {
    if (is_dir(base_path("app/Enums"))) {
        $enums = glob(base_path("app/Enums/**"));

        foreach ($enums as $enum) {
            unlink($enum);
        }

        rmdir(base_path("app/Enums"));
    }
});

it("created a new enum", function () {
    $enumCommand = $this->artisan("make:enum", [
        "name" => "Cheese",
    ]);

    if ((float) phpversion() < 8.1) {
        $enumCommand->assertFailed();
        expect(file_exists(base_path("app/Enums/Cheese.php")))->toBeFalse();
    } else {
        $enumCommand->assertSuccessful();
        expect(file_exists(base_path("app/Enums/Cheese.php")))->toBeTrue();
    }
});

it("failed when the enum already exists", function () {
    $enumCommand = $this->artisan("make:enum", [
        "name" => "Cracker",
    ]);

    if ((float) phpversion() < 8.1) {
        $enumCommand->assertFailed();
        expect(file_exists(base_path("app/Enums/Cracker.php")))->toBeFalse();
    } else {
        $enumCommand->assertSuccessful();
        expect(file_exists(base_path("app/Enums/Cracker.php")))->toBeTrue();
        $this->artisan("make:enum", [
            "name" => "Cracker",
        ])->assertFailed();
    }
});
