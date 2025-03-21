<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];    


    protected $fillable = [
        'title',
        'slug',
        'content',
        'published'
    ];
}
