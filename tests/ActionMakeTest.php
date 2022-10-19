<?php

use Illuminate\Support\Facades\File;

it('created a new action', function () {
    $this->artisan('make:action', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Actions/Cheese.php')))->toBeTrue();

    unlink(app_path('Actions/Cheese.php'));
    rmdir(app_path('Actions'));
});

it('failed when the action already exists', function () {
    $this->artisan('make:action', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Actions/Cracker.php')))->toBeTrue();

    $this->artisan('make:action', [
        'name' => 'Cracker',
    ])->assertFailed();

    unlink(app_path('Actions/Cracker.php'));
    rmdir(app_path('Actions'));
});
