<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? now() : null;   
    }
}
