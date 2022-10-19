<?php

use Illuminate\Support\Facades\File;

it('created a new trait', function () {
    $this->artisan('make:trait', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Traits/Cheese.php')))->toBeTrue();

    unlink(app_path('Traits/Cheese.php'));
    rmdir(app_path('Traits'));
});

it('failed when the trait already exists', function () {
    $this->artisan('make:trait', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Traits/Cracker.php')))->toBeTrue();

    $this->artisan('make:trait', [
        'name' => 'Cracker',
    ])->assertFailed();

    unlink(app_path('Traits/Cracker.php'));
    rmdir(app_path('Traits'));
});
