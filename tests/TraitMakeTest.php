<?php

beforeEach(function () {
    if (is_dir(base_path("app/Traits"))) {
        $traits = glob(base_path("app/Traits/**"));

        foreach ($traits as $trait) {
            unlink($trait);
        }

        rmdir(base_path("app/Traits"));
    }
});

it("created a new trait", function () {
    $this->artisan("make:trait", [
        "name" => "Cheese",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Traits/Cheese.php")))->toBeTrue();
});

it("failed when the trait already exists", function () {
    $this->artisan("make:trait", [
        "name" => "Cracker",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Traits/Cracker.php")))->toBeTrue();

    $this->artisan("make:trait", [
        "name" => "Cracker",
    ])->assertFailed();
});
