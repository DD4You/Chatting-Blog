<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $latestPost = Blog::with('category')->active()->latest()->first();

        $posts = Blog::with('category')
            ->when(
                $request->search,
                fn ($q) => $q->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('meta_desc', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tags', 'LIKE', '%' . $request->search . '%')
            )
            ->when($request->category, fn ($q) => $q->where('category_id', $request->category))
            ->active()
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('welcome', compact('latestPost', 'posts'));
    }

    public function filterByCategory(Request $request, Category $category)
    {
        $latestPost = Blog::with('category')->active()->latest()->first();

        $posts = Blog::with('category')
            ->when(
                $request->search,
                fn ($q) => $q->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('meta_desc', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tags', 'LIKE', '%' . $request->search . '%')
            )
            ->when($request->category, fn ($q) => $q->where('category_id', $category->id))
            ->active()
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('welcome', compact('latestPost', 'posts'));
    }

    public function show(Blog $blog)
    {
        return view('blog', compact('blog'));
    }
    public function legalStuff($key)
    {
        $key = str_replace('-', '_', $key);
        $data = settings($key, false, false);
        return view('legal_stuff', compact('data'));
    }
}
