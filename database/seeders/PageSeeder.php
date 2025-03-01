<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'About',
                'slug' => Str::slug('About'),
                'published' => true,
                'hero_title' => 'About Us',
                'hero_subtitle' => 'Learn more about our mission and values.',
                'hero_button' => 'Read More',
                'hero_image' => null, // Update with actual image path if needed
                'content' => json_encode([
                    [
                        "type" => "block", 
                        "data" => [
                            "block_layout" => "image-boxed",
                            "block_title" => "Block title 1",
                            "block_description" => "Block description 1",
                            "block_image" => "block-images/block-image.svg",
                            "block_invert" => true
                        ]
                    ],
                    [
                        "type" => "block", 
                        "data" => [
                            "block_layout" => "image-half",
                            "block_title" => "Block title 2",
                            "block_description" => "Block description 2",
                            "block_image" => "block-images/block-image.svg",
                            "block_invert" => false
                        ]
                        ],
                        [
                            "type" => "block", 
                            "data" => [
                                "block_layout" => "image-half",
                                "block_title" => "Block title 3",
                                "block_description" => "Block description 3",
                                "block_image" => "block-images/block-image.svg",
                                "block_invert" => true
                            ]
                        ],
                        [
                            "type" => "entries",
                            "data" => [
                                "entry" => "1"
                            ]
                        ]
                ]),

                'meta_title' => 'About Us',
                'meta_description' => 'Learn more about our company and what we do.',
                'meta_image' => null, // Update with actual image path if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact',
                'slug' => Str::slug('Contact'),
                'published' => true,
                'hero_title' => 'Contact Us',
                'hero_subtitle' => 'Get in touch with our team.',
                'hero_button' => 'Send a Message',
                'hero_image' => null, // Update with actual image path if needed
                'content' => json_encode([
                    ["type" => "paragraph", "data" => ["content" => "<p>Feel free to reach out to us.</p>"]]
                ]),
                'meta_title' => 'Contact Us',
                'meta_description' => 'Reach out to our team for any inquiries.',
                'meta_image' => null, // Update with actual image path if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

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
