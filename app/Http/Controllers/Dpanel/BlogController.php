<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('category:id,name')->latest()->paginate(10);

        return view('dpanel.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('dpanel.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $content = [];
        $indexF = 0;
        $indexT = 0;

        foreach ($request->type as $key => $value) {
            $content[$key]['type'] = $value;

            if (in_array($value, ['image', 'imageL', 'imageR'])) {
                $content[$key]['data'] = $request->content_file[$indexF]->store('media', 'public');
                $indexF++;
            } else {
                $content[$key]['data'] = $request->content[$indexT];
                $indexT++;
            }
        }


        $blog = Blog::create([
            'category_id' => $request->category_id,
            'featured_image' => $request->file('featured_image')->store('media', 'public'),
            'title' => $request->title,
            'meta_desc' => $request->meta_desc,
            'tags' => $request->tags,
            'content' => count($content) ? json_encode($content) : null,
            'status' => isset($request->draft) ? 'Draft' : 'Published'
        ]);

        return redirect()->route(config('dpanel.prefix') . '.blog.index')->withSuccess('New Blog Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
