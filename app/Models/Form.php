<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Form extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'fields'
    ];

    protected $casts = [
        'fields' => 'array',
    ];   
    
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

}
    
