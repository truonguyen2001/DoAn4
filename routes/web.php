<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductDetailController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('admin')->group(function () {
    Route::get('', function () {
        return redirect(route('admin.home'));
    });
    Route::get('home', [AdminController::class, 'Index'])->name('admin.home');
    Route::get('product', [AdminController::class, 'Product']);
    Route::post('product/{id}', [AdminController::class, 'ProductSave']);
    Route::get('product/{id}', [AdminController::class, 'ProductDetail']);
    Route::get('invoice', [AdminController::class, 'Invoice']);
    Route::post('invoice/{id}', [AdminController::class, 'InvoiceSave']);
    Route::get('invoice/{id}', [AdminController::class, 'InvoiceDetail']);
    Route::get('category', [AdminController::class, 'Category']);
    Route::get('product-detail', [AdminController::class, 'ProductDetails']);
    Route::get('providers', [AdminController::class, 'Providers']);
    Route::get('customer', [AdminController::class, 'Customer']);
    Route::get('employee', [AdminController::class, 'Employee']);
});

Route::get('', function () {
    return redirect(route('home.index'));
});
Route::prefix('home')->group(function () {
    Route::get('',  [IndexController::class, 'index'])->name('home.index');
    Route::get('pages/cart', function () {
        return view('home/pages/cart', ['categories' => Category::all()]);
    })->name('cart');

    Route::get('pages/productdetail/{id}', [ProductDetailController::class,'index'])->name('productdetail');

    // Route::get('pages/shop', function () {
    //     return view('home/pages/shop', ['categories' => Category::all()]);
    // })->name('shop');

    Route::get('pages/shop/{id}', [ShopController::class, 'index'])->name('shop-list');
    Route::get('pages/shop', [ShopController::class, 'shop'])->name('shop');

    Route::get('pages/contact', function () {
        return view('home/pages/contact', ['categories' => Category::all()]);
    })->name('contact');

    Route::get('pages/checkout', function () {
        return view('home/pages/checkout', ['categories' => Category::all()]);
    })->name('checkout');

    Route::get('pages/login', function () {
        return view('home/pages/login', ['categories' => Category::all()]);
    })->name('login');
});


Route::fallback(function () {
    return view('notFound');
});

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login')->withoutMiddleware('auth');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::post('login-post', [LoginController::class, 'loginPost'])->name('admin.login-post')->withoutMiddleware('auth');
});
