<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array', 
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_image',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_layout',
        'hero_invert',
        'published'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ?? '';  // Convert null to empty string
    }
}
