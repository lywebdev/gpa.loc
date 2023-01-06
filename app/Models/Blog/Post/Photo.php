<?php

namespace App\Models\Blog\Post;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'blog_posts_photos';

    protected $guarded = [];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
