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
                    [
                        "type" => "entry", 
                        "data" => [
                            "entry_title" => "Blog title 2",
                            "entry_slug" => "blog-2",
                            "entry_description" => "Blog description 2",
                            "entry_image" => "entry-images/entry-image.svg",
                        ]
                    ],
                    [
                        "type" => "entry", 
                        "data" => [
                            "entry_title" => "Blog title 3",
                            "entry_slug" => "blog-3",
                            "entry_description" => "Blog description 3",
                            "entry_image" => "entry-images/entry-image.svg",
                        ]
                    ],
                    [
                        "type" => "entry", 
                        "data" => [
                            "entry_title" => "Blog title 4",
                            "entry_slug" => "blog-4",
                            "entry_description" => "Blog description 4",
                            "entry_image" => "entry-images/entry-image.svg",
                        ]
                    ],
                    [
                        "type" => "entry", 
                        "data" => [
                            "entry_title" => "Blog title 5",
                            "entry_slug" => "blog-5",
                            "entry_description" => "Blog description 5",
                            "entry_image" => "entry-images/entry-image.svg",
                        ]
                    ]
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
