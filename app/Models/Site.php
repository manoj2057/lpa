<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneno',
        'email',
        'location',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'about_info',
        'seo_title',
        'seo_subtitle',
        'seo_keywords',
        'seo_description'
    ];

}
