<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'user_id' => 1,
                'site_name' => 'Test site',
                'site_logo' => null, // Or specify a logo file if available
                'dark_mode' => false, // Default is false, can change as needed
                'meta_title' => 'Test Site Meta Title',
                'meta_description' => 'This is a meta description for the Test site.',
                'meta_image' => 'default-meta-image.jpg', // Replace with an actual image filename
                'light_color' => '#FFFFFF', // Example light color
                'dark_color' => '#000000', // Example dark color
                'colors' => json_encode([
                    ["color" => "#fa520a", "label" => "Orange"],
                    ["color" => "#d814f0", "label" => "Purple"],
                    ["color" => "#14f7f7", "label" => "Blue"]
                ]), 
                
            ],
        ]);
    }
}
