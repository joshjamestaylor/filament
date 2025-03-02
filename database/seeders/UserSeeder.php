<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Filament\Commands\MakeUserCommand as FilamentMakeUserCommand;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $filamentMakeUserCommand = new FilamentMakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'josh',
            'email' => 'josh@example.com',
            'password' => Hash::make('test1234'),
        ]);
    }
}
