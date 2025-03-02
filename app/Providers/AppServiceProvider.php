<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $setting = Setting::first();
        view()->share([
            'site_name' => $setting->site_name,
            'site_logo' => $setting->site_logo,
            'meta_title' => $setting->meta_title,
            'meta_description' => $setting->meta_description,
            'meta_image' => $setting->meta_image,
            'light_color' => $setting->light_color,
            'dark_color' => $setting->dark_color,
            'colors' => json_decode($setting->colors, true),
            'dark_mode' => $setting->dark_mode
        ]);    }
}
