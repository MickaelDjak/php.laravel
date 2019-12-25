<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id', 'id');
    }
}
