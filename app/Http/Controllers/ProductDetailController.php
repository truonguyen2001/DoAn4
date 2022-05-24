<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($id) {
        // $products = Category::find($id)->products;
        $product = Product::find($id);
        $products = Product::where('category_id', '=', $product->category_id)->where('id', '!=', $id)->get();
        return view('home/pages/productdetail', ['product' => $product, 'products' => $products]);
    }
}
