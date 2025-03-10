<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{

    use HasFactory;

    protected $fillable = [
        'form_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'answers'
    ];


    protected $casts = [
        'answers' => 'array',
    ];    

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
