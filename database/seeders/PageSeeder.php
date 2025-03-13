<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'Home',
                'slug' => '',
                'published' => true,
                'hero_title' => 'Home',
                'hero_subtitle' => 'Welcome to the site',
                'hero_button' => 'Read More',
                'hero_image' => null, // Update with actual image path if needed
                    'content' => json_encode([
                        [
                            "type" => "block", 
                            "data" => [
                                "block_layout" => "image-boxed",
                                "block_title" => "Block title 1",
                                "block_subtitle" => "Block subtitle 1",
                                "block_image" => "block-images/block-image.svg",
                                "block_invert" => true,
                                "block_content" => [
                                    [
                                        "block_content_type" => "text",
                                        "block_content_text" => "Block content copy"
                                    ],
                                    
                                ]

                            ]
                        ],
                        [
                            "type" => "block", 
                            "data" => [
                                "block_layout" => "image-half",
                                "block_title" => "Block title 2",
                                "block_subtitle" => "Block subtitle 2",
                                "block_image" => "block-images/block-image.svg",
                                "block_invert" => false
                            ]
                            ],
                            [
                                "type" => "block", 
                                "data" => [
                                    "block_layout" => "image-half",
                                    "block_title" => "Block title 3",
                                    "block_subtitle" => "Block subtitle 3",
                                    "block_image" => "block-images/block-image.svg",
                                    "block_invert" => true
                                ]
                            ],
                            [
                                "type" => "entries",
                                "data" => [
                                    "entry" => "1",
                                    "entries_layout" => "show-preview",
                                    "linked_page" => "news"
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
                                "block_subtitle" => "Block subtitle 1",
                                "block_image" => "block-images/block-image.svg",
                                "block_invert" => true
                            ]
                        ],
                        [
                            "type" => "block", 
                            "data" => [
                                "block_layout" => "image-half",
                                "block_title" => "Block title 2",
                                "block_subtitle" => "Block subtitle 2",
                                "block_image" => "block-images/block-image.svg",
                                "block_invert" => false
                            ]
                            ],
                            [
                                "type" => "block", 
                                "data" => [
                                    "block_layout" => "image-half",
                                    "block_title" => "Block title 3",
                                    "block_subtitle" => "Block subtitle 3",
                                    "block_image" => "block-images/block-image.svg",
                                    "block_invert" => true
                                ]
                            ],
        
                            
    
                ]),
                'meta_title' => 'About Us',
                'meta_description' => 'Learn more about our company and what we do.',
                'meta_image' => null, // Update with actual image path if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'News',
                'slug' => Str::slug('News'),
                'published' => true,
                'hero_title' => 'News',
                'hero_subtitle' => 'Follow us for more news.',
                'hero_button' => 'Read More',
                'hero_image' => null, // Update with actual image path if needed
                    'content' => json_encode([
    
                            [
                                "type" => "entries",
                                "data" => [
                                    "entry" => "1",
                                    "entries_layout" => "show-all"
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
            ]
        ]);
    }
}
