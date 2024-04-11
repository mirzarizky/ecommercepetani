<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Category', true, route('admin.category.index')],
            ['Index', false],
        ];
        $title = 'All Category';
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('breadcrumbs', 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Category', true, route('admin.category.index')],
            ['Add', false],
        ];
        $title = 'Add Category';
        return view('admin.category.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->route('admin.category.create')->with(['color' => 'bg-success-500', 'message' => __('category.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $breadcrumbs = [
            ['Category', true, route('admin.category.index')],
            [$category->name, false],
        ];
        $title = $category->name;
        $editable = false;
        return view('admin.category.edit', compact('breadcrumbs', 'title', 'category', 'editable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $breadcrumbs = [
            ['Category', true, route('admin.category.index')],
            [$category->name, false],
        ];
        $title = $category->name;
        $editable = true;
        return view('admin.category.edit', compact('breadcrumbs', 'title', 'category', 'editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('admin.category.index')->with(['color' => 'bg-success-500', 'message' => __('category.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('category.success.delete')]);
    }
}
