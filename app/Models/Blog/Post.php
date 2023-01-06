<?php

namespace App\Models\Blog;

use App\Models\Blog\Post\Photo;
use App\Services\sluggable\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function firstPhoto()
    {
        return $this->hasOne(Photo::class);
    }
}
