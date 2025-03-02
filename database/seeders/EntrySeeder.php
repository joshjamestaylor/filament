<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EntrySeeder extends Seeder
{
    public function run()
    {
        DB::table('entries')->insert([
            [
                'title' => 'Blogs',
                'slug' => Str::slug('blogs'),
                'published' => true,
                'content' => json_encode([
                    [
                        "type" => "entry", 
                        "data" => [
                            "entry_title" => "Blog title 1",
                            "entry_slug" => "blog-1",
                            "entry_description" => "Blog description 1",
                            "entry_image" => "entry-images/entry-image.svg",
                        ]
                    ],
                    // Add other entry data as needed...
                ]),
            ],
            [
                'title' => 'News',
                'slug' => Str::slug('news'),
                'published' => true,
                'content' => null, // Ensure content is included, even if null
            ],
            [
                'title' => 'Products',
                'slug' => Str::slug('products'),
                'published' => true,
                'content' => null, // Ensure content is included, even if null
            ]
        ]);
    }
}
