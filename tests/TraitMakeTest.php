<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (is_dir(app_path('Traits'))) {
        $traits = glob(app_path('Traits/**'));

        foreach ($traits as $trait) {
            unlink($trait);
        }

        rmdir(app_path('Traits'));
    }
});

it('created a new trait', function () {
    $this->artisan('make:trait', [
        'name' => 'Cheese',
    ])->assertSuccessful();

    expect(File::exists(app_path('Traits/Cheese.php')))->toBeTrue();
});

it('failed when the trait already exists', function () {
    $this->artisan('make:trait', [
        'name' => 'Cracker',
    ])->assertSuccessful();

    expect(File::exists(app_path('Traits/Cracker.php')))->toBeTrue();

    $this->artisan('make:trait', [
        'name' => 'Cracker',
    ])->assertFailed();
});
