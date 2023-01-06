<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Category\StoreRequest;
use App\Models\Blog\Category;
use App\Services\category\CategoryService;
use App\Services\media\MediaService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $mediaService;

    public function __construct()
    {
        $this->mediaService = new MediaService();
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(15);

        return view('admin.sections.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.sections.blog.categories.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.blog.categories.index')->with('success', 'Категория добавлена');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.sections.blog.categories.edit', compact('category', 'categories'));
    }

    public function update(Category $category, StoreRequest $request)
    {
        $category->update($request->validated());

        return redirect()->back()->with('success', 'Изменения внесены');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.blog.categories.index')->with('success', 'Категория удалена');
    }
}
