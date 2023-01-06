<?php

namespace App\Providers;

use App\Models\Blog\Post;
use App\Models\Entrant\Entrant;
use App\Observers\Blog\Post\PhotoObserver;
use App\Observers\Blog\PostObserver;
use App\Observers\Entrant\EntrantObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Post\Photo::observe(PhotoObserver::class);

        Entrant::observe(EntrantObserver::class);
    }
}
