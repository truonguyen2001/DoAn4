<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function Index(Request $request)
    {    
        $products = Product::all();
        $product = Product::orderByDesc('created_at')->take(10)->get();
        return view("home/pages/index",compact( 'products', 'product'));
    }

}
