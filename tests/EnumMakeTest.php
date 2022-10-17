<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (is_dir(app_path('Enums'))) {
        $enums = glob(app_path('Enums/**'));

        foreach ($enums as $enum) {
            unlink($enum);
        }

        rmdir(app_path('Enums'));
    }
});

it('created a new enum', function () {
    if ((float) phpversion() < 8.1) {
        $this->artisan('make:enum', [
            'name' => 'Cheese',
        ])->assertFailed();
        expect(File::exists(app_path('Enums/Cheese.php')))->toBeFalse();
    } else {
        $this->artisan('make:enum', [
            'name' => 'Cheese',
        ])->assertSuccessful();
        expect(File::exists(app_path('Enums/Cheese.php')))->toBeTrue();
    }
});

it('failed when the enum already exists', function () {
    if ((float) phpversion() < 8.1) {
        $this->artisan('make:enum', [
            'name' => 'Cracker',
        ])->assertFailed();
        expect(File::exists(app_path('Enums/Cracker.php')))->toBeFalse();
    } else {
        $this->artisan('make:enum', [
            'name' => 'Cracker',
        ])->assertSuccessful();
        expect(File::exists(app_path('Enums/Cracker.php')))->toBeTrue();
        $this->artisan('make:enum', [
            'name' => 'Cracker',
        ])->assertFailed();
    }
});
