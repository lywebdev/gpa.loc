<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\StoreRequest;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Services\media\MediaService;

class PostController extends Controller
{
    private $mediaService;

    public function __construct()
    {
        $this->mediaService = new MediaService();
    }


    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(16);

        return view('admin.sections.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.sections.blog.posts.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $createdPost = Post::create($request->validated());
        $requestPhotos = $request->get('files');

        if (!is_null($requestPhotos)) {
            foreach ($requestPhotos as $photoBlob) {
                $path = 'uploads/blog/posts/' . $createdPost->id . '/' .uniqid();
                $filename = $this->mediaService->storeFromBase64($photoBlob, $path);

                $createdPost->photos()->create([
                    'post_id' => $createdPost->id,
                    'filename' => $filename
                ]);
            }
        }


        return redirect()->route('admin.blog.posts.index')->with('success', 'Пост добавлен');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.sections.blog.posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post, StoreRequest $request)
    {
        $post->update($request->validated());

        return redirect()->back()->with('success', 'Изменения внесены');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.blog.posts.index')->with('success', 'Пост удалён');
    }
}
