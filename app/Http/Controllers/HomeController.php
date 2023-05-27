<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

    public function show($slug)
    {
        $blog = Blog::active()->where('slug', $slug)->first();

        abort_if(!$blog, 404);

        return view('blog', compact('blog'));
    }
}
