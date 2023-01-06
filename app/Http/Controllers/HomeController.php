<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\UniversityEvent;
use App\Services\media\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

class HomeController extends Controller
{
    public function home()
    {
        $blogPosts = Post::orderBy('id', 'desc')->limit(6)->get();
        /*
        $universityOldEvents = UniversityEvent::whereBetween('date', [
            Carbon::parse('-1 week')->startOfDay(),
            Carbon::parse('today')->endOfDay(),
        ])
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        */
        $universityCurrentEvents = UniversityEvent::whereBetween('date', [
            Carbon::parse('- 1 week')->startOfDay(),
            Carbon::parse('+ 1 week')->endOfDay(),
        ])
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        /*
        $universityUpcomingEvents = UniversityEvent::whereBetween('date', [
            Carbon::parse('today')->startOfDay(),
            Carbon::parse('+ 1 week')->endOfDay(),
        ])
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        */

        return view('home', [
            'blogPosts' => $blogPosts,
//            'universityOldEvents' => $universityOldEvents,
            'universityCurrentEvents' => $universityCurrentEvents,
//            'universityUpcomingEvents' => $universityUpcomingEvents,
        ]);
    }

    public function test()
    {
        $photo = Post\Photo::where('id', 23)->first();
        $photo->delete();
    }
}
