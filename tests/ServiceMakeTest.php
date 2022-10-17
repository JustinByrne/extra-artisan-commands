<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (is_dir(app_path('Services'))) {
        $services = glob(app_path('Services/**'));

        foreach ($services as $service) {
            unlink($service);
        }

        rmdir(app_path('Services'));
    }
});

it('created a new service', function () {
    $this->artisan('make:service', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Services/Cheese.php')))->toBeTrue();
});

it('failed when the service already exists', function () {
    $this->artisan('make:service', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Services/Cracker.php')))->toBeTrue();

    $this->artisan('make:service', [
        'name' => 'Cracker',
    ])->assertFailed();
});
