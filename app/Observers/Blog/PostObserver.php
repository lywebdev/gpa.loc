<?php

namespace App\Observers\Blog;

use App\Models\Blog\Post;
use App\Services\media\MediaService;
use App\Services\sluggable\SlugService;

class PostObserver
{
    private $mediaService;

    public function __construct()
    {
        $this->mediaService = new MediaService();
    }

    public function saving(Post $post)
    {
        $slugService = new SlugService();
        $post->slug = $slugService->createSlug($post->title, '-', Post::class, 'slug');
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    public function updating(Post $post)
    {
        $slugService = new SlugService();
        $post->slug = $slugService->createSlug($post->title, '-', Post::class, 'slug');
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $post->photos()->delete();
        $this->mediaService->deleteDir('uploads/blog/posts/' . $post->id);
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
