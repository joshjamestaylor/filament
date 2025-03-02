<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'site_name',
        'site_logo',
        'meta_title',
        'meta_description',
        'meta_image',
        'colors',
        'dark_mode',
        'light_color',
        'dark_color'
    ];

    /**
     * Get the user that owns the setting.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mount()
    {
        // Assuming 'site_name' is a column in the settings table
        $this->siteName = Setting::first()->site_name;
    }
}
