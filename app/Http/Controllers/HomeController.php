<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->with('category')->where('is_stock', 1)->limit(8)->get();
        return view('home.index', compact('products'));
    }

    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with('category')->latest()->paginate(12);

        $title = 'Category ' . $category->name;

        return view('home.products', compact('products', 'title'));
    }
    public function product(Request $request)
    {
        $products = Product::with('category')->where('is_stock', 1)->when(@$request->search, function ($query) use ($request) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%$search%");
        })->latest()->paginate(12);

        $title = 'Product';

        return view('home.products', compact('products', 'title'));
    }

    public function product_detail(Product $product)
    {
        $product = Product::with(['comments.user', 'category'])->where('id', $product->id)->first();

        $title = $product->name;

        return view('home.product-detail', compact('product', 'title'));
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product telah ditambahkan');
    }

    public function minusCart($id)
    {
        $cart = session()->get('cart', []);

        if ($cart[$id]['quantity'] == 1) {
            unset($cart[$id]);
        } else {
            $cart[$id]['quantity']--;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk telah dikurangi');
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk telah dihapus');
    }
}
