<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestPost extends Component
{
    public $posts;
    public function __construct()
    {
        $this->posts = Blog::with('category')->active()->latest()->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-post');
    }
}
