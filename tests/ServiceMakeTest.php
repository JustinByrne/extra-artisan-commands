<?php

use Illuminate\Support\Facades\File;

it('created a new service', function () {
    $this->artisan('make:service', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Services/Cheese.php')))->toBeTrue();

    unlink(app_path('Services/Cheese.php'));
    rmdir(app_path('Services'));
});

it('failed when the service already exists', function () {
    $this->artisan('make:service', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Services/Cracker.php')))->toBeTrue();

    $this->artisan('make:service', [
        'name' => 'Cracker',
    ])->assertFailed();

    unlink(app_path('Services/Cracker.php'));
    rmdir(app_path('Services'));
});
