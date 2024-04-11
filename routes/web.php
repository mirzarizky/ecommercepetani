<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogMoneyController;
use App\Http\Controllers\LogMoneySellerController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSellerController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawAdminController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Language Change
Route::get('lang/{lang}', function ($lang) {
    if (array_key_exists($lang, Config::get('languages'))) {
        Session::put('applocale', $lang);
    }
    return redirect()->back();
})->name('lang');

Route::middleware('language')->group(function () {
    // Dashboard routes
    Route::middleware('auth')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(HomeController::class)->name('beranda.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/category/{category:slug}', 'category')->name('category');
        Route::get('/product', 'product')->name('product');
        Route::get('/product/{product:slug}', 'product_detail')->name('product.detail');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/cart/add/{id}', 'addToCart')->name('cart.add');
        Route::get('/cart/min/{id}', 'minusCart')->name('cart.min');
        Route::get('/cart/remove/{id}', 'removeCart')->name('cart.remove');
    });

    // Admin routes
    Route::middleware('role:admin', 'auth')->prefix('admin')->name('admin.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'admin')->name('dashboard');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('seller', SellerController::class);
        Route::resource('order', OrderAdminController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('payment-method', PaymentMethodController::class);

        Route::resource('user', UserController::class);
        Route::resource('log-money', LogMoneyController::class)->only(['index']);

        Route::resource('withdraw', WithdrawAdminController::class)->only(['index', 'update']);
    });

    // Seller routes
    Route::middleware('role:seller', 'auth')->prefix('seller')->name('seller.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'seller')->name('dashboard');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('product', ProductController::class);
        Route::resource('order', OrderSellerController::class);

        Route::resource('log-money', LogMoneySellerController::class)->only(['index']);
        Route::resource('withdraw', WithdrawController::class)->only(['index', 'create', 'store']);
    });

    // Customer routes
    Route::middleware('role:customer', 'auth')->prefix('customer')->name('customer.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'customer')->name('dashboard');
        });

        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('order', OrderController::class)->except('destroy');

        // Route::post('new-address/{orderId}', [AddressController::class, '__invoke'])->name('address.new');
    });
});

require __DIR__ . '/auth.php';
