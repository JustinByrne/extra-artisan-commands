<?php

beforeEach(function () {
    if (is_dir(base_path("app/Services"))) {
        $services = glob(base_path("app/Services/**"));

        foreach ($services as $service) {
            unlink($service);
        }

        rmdir(base_path("app/Services"));
    }
});

it("created a new service", function () {
    $this->artisan("make:service", [
        "name" => "Cheese",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Services/Cheese.php")))->toBeTrue();
});

it("failed when the service already exists", function () {
    $this->artisan("make:service", [
        "name" => "Cracker",
    ])->assertSuccessful();

    expect(file_exists(base_path("app/Services/Cracker.php")))->toBeTrue();

    $this->artisan("make:service", [
        "name" => "Cracker",
    ])->assertFailed();
});
