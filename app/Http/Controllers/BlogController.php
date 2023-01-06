<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->get('search');

        $posts = Post::whereIn('id', Post::where('title', 'LIKE', "%{$searchQuery}%")->get()->pluck('id'));
        $posts = $posts->orderBy('id', 'desc')->paginate(16);

        $seo = collect();
        $seo->title = "Блог | " . env('APP_NAME');

        return view('sections.blog.index', compact('posts', 'seo'));
    }

    public function post(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }

        return view('sections.blog.show', compact('post'));
    }
}
