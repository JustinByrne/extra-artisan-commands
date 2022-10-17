<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (is_dir(app_path('Actions'))) {
        $actions = glob(app_path('Actions/**'));

        foreach ($actions as $action) {
            unlink($action);
        }

        rmdir(app_path('Actions'));
    }
});

it('created a new action', function () {
    $this->artisan('make:action', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Actions/Cheese.php')))->toBeTrue();
});

it('failed when the action already exists', function () {
    $this->artisan('make:action', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Actions/Cracker.php')))->toBeTrue();

    $this->artisan('make:action', [
        'name' => 'Cracker',
    ])->assertFailed();
});
