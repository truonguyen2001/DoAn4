<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($id) {
        $products = Category::find($id)->products;
        return view('home/pages/shop-list', compact('products'));
    }
    public function shop(Request $request)
    {
        $products = Product::all();
        return view("home/pages/shop",compact( 'products'));
    }
}
