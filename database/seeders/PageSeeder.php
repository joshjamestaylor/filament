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
                    ["type" => "paragraph", "data" => ["content" => "<p>Welcome to our about page.</p>"]]
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
    }
}
