<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Comment extends Model
{
    use HasFactory;
    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

}
