<?php

namespace App\Models\Blog;

use App\Services\sluggable\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $table = 'blog_categories';

    protected $guarded = [];

    public $timestamps = false;


    public function getParentsNames() {
        if($this->parent) {
            return $this->parent->getParentsNames(). " > " . $this->name;
        } else {
            return $this->name;
        }
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $slugService = new SlugService();
            $category->slug = $slugService->createSlug($category->name, '-', self::class, 'slug', $category->parent_id);
        });

        static::updating(function ($category) {
            $slugService = new SlugService();
            $category->slug = $slugService->createSlug($category->name, '-', self::class, 'slug', $category->parent_id);
        });
    }
}
