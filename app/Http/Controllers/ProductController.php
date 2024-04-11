<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Product', true, route('seller.product.index')],
            ['Index', false],
        ];
        $title = 'All Products';
        $products = Product::where('user_id', Auth::id())->latest()->get();
        return view('seller.product.index', compact('breadcrumbs', 'title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Product', true, route('seller.product.index')],
            ['Add', false],
        ];
        $title = 'Add Product';

        $categories = Category::orderBy('name', 'asc')->get();

        return view('seller.product.create', compact('breadcrumbs', 'title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->name);
        $validated['image'] = $request->image->store('picture');
        $validated['is_stock'] = @$request->is_stock ? true : false;

        Product::create($validated);

        return redirect()->route('seller.product.create')->with(['color' => 'bg-success-500', 'message' => __('product.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $breadcrumbs = [
            ['Product', true, route('seller.product.index')],
            [$product->name, false],
        ];
        $title = $product->name;
        $editable = false;

        $categories = Category::orderBy('name', 'asc')->get();

        return view('seller.product.edit', compact('breadcrumbs', 'title', 'product', 'editable', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $breadcrumbs = [
            ['Product', true, route('seller.product.index')],
            [$product->name, false],
        ];
        $title = $product->name;
        $editable = true;

        $categories = Category::orderBy('name', 'asc')->get();

        return view('seller.product.edit', compact('breadcrumbs', 'title', 'product', 'editable', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->image) {
            $validated['image'] = $request->image->store('picture');
        }

        $validated['slug'] = Str::slug($request->name);
        $validated['is_stock'] = @$request->is_stock ? true : false;

        $product->update($validated);

        return redirect()->route('seller.product.index')->with(['color' => 'bg-success-500', 'message' => __('product.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('product.success.delete')]);
    }
}
