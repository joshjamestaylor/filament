<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormSeeder extends Seeder
{
    public function run()
    {
        DB::table('forms')->insert([
            [
                'title' => 'Contact form',
                'fields' => json_encode([
                    [
                        "field_id" => "message", 
                        "field_title" => "Message", 
                        "field_type" => "text"    
                    ]
                ]),
            ]
        ]);
    }
}
