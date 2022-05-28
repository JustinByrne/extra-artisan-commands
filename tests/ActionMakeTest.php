<?php

beforeEach(function () {
    if (is_dir(base_path("app/Actions"))) {
        $actions = glob(base_path("app/Actions/**"));

        foreach ($actions as $action) {
            unlink($action);
        }

        rmdir(base_path("app/Actions"));
    }
});

it("created a new action", function () {
    $this->artisan("make:action", [
        "name" => "Cheese",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Actions/Cheese.php")))->toBeTrue();
});

it("failed when the action already exists", function () {
    $this->artisan("make:action", [
        "name" => "Cracker",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Actions/Cracker.php")))->toBeTrue();

    $this->artisan("make:action", [
        "name" => "Cracker",
    ])->assertFailed();
});
