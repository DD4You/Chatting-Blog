<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);

        return view('dpanel.categories', compact('categories'));
    }


    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return back()->withSuccess('Category Added Successfully');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return back()->withSuccess('Category Updated Successfully');
    }
}
