@extends('home/layout/layout')
@section('title')
    Shop
@endsection
@section('page-title')
    Shop
@endsection
@section('main-content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Shop</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="/home">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="shop-category-area">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 col-sm-6" style="float: left;">
                <article class="list-product">
                    <div class="img-block">
                        <a href="/home/pages/productdetail/{{$product->id}}" class="thumbnail">
                            <img class="first-img" src="{{ '/api/files/' . $product->image->file_path }}" alt="">
                            <img class="second-img" src="{{ '/api/files/' . $product->image->file_path }}" alt="">
                        </a>
                    </div>
                    <ul class="product-flag">
                        <li class="new">Trả góp 0%</li>
                    </ul>
                    <div class="product-decs">
                        <h2><a href="/home/pages/productdetail/{{$product->id}}" class="product-link">{{$product->name}}</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="current-price">{{ number_format($product->details->min('out_price'), 0, ',', '.') }}</li>
                                <li class="discount-price">New</li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-link">
                        <ul>
                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                            <li>
                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                            </li>
                            <li>
                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                            </li>
                        </ul>
                    </div>
                    
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection