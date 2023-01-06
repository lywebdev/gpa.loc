<?php

namespace App\Observers\Blog\Post;

use App\Models\Blog\Post\Photo;
use App\Services\media\MediaService;

class PhotoObserver
{
    /**
     * Handle the Photo "created" event.
     *
     * @param  \App\Models\Blog\Post\Photo  $photo
     * @return void
     */
    public function created(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "updated" event.
     *
     * @param  \App\Models\Blog\Post\Photo  $photo
     * @return void
     */
    public function updated(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     *
     * @param  \App\Models\Blog\Post\Photo  $photo
     * @return void
     */
    public function deleted()
    {

    }

    public function deleting(Photo $photo)
    {
        $mediaService = new MediaService();
        $mediaService->delete($photo->filename);
    }

    /**
     * Handle the Photo "restored" event.
     *
     * @param  \App\Models\Blog\Post\Photo  $photo
     * @return void
     */
    public function restored(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     *
     * @param  \App\Models\Blog\Post\Photo  $photo
     * @return void
     */
    public function forceDeleted(Photo $photo)
    {
        //
    }
}
