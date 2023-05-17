<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total['category'] = Category::count();
        $total['blog'] = Blog::count();

        return view('dpanel.dashboard', compact('total'));
    }
}
