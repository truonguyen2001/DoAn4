@extends('home/layout/layout')
@section('title')
    Trang chủ
@endsection
@section('page-title')
    Trang chủ
@endsection
@section('main-content')
    @include('home/layout/slide')
    <!-- Recent Add Product Area Start -->
<section class="recent-add-area static-area mtb-60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h2>Sản phẩm mới</h2>
                </div>
                <!-- Section Title -->
            </div>
        </div>
        <!-- Recent Product slider Start -->
        <div class="recent-product-slider owl-carousel owl-nav-style">
            <!-- Single Item -->
            @foreach ($product as $product)
            <article class="list-product">
                <div class="img-block">
                    <a href="/home/pages/productdetail/{{ $product->id }}" class="thumbnail">
                        <img class="first-img" height="200px" src="{{ '/api/files/' . $product->image->file_path }}" alt="" />
                        <img class="second-img" height="200px" src="{{ '/api/files/' . $product->image->file_path }}" alt="" />
                    </a>
                </div>
                <ul class="product-flag">
                    <li class="new">Trả góp 0%</li>
                </ul>
                <div class="product-decs">
                    <h2><a href="/home/pages/productdetail/{{ $product->id }}" class="product-link">{{$product->name}}</a></h2>
                    <div class="rating-product">
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="current-price">
                                {{ number_format($product->details->min('out_price'), 0, ',', '.') }}
                            </li>
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
            @endforeach
        </div>
        <!-- Recent product slider end -->
    </div>
</section>
<div class="banner-area-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-inner">
                    <a href="/home/pages/shop"><img src="/assets/home/images/Title3.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Best Sells Area Start -->
    <section class="static-area mtb-60px">
        <div class="container">
            <!-- Section Title Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản phẩm</h2>
                    </div>
                </div>
            </div>
            <!-- Section Title End -->
            <!-- Best Sell Slider Carousel Start -->
            <div class="best-sell-slider owl-carousel owl-nav-style">
                <!-- Single Item -->
                @foreach ($products as $product)
                    <article class="list-product">
                        <div class="img-block">
                            <a href="/home/pages/productdetail/{{ $product->id }}" class="thumbnail">
                                <img class="first-img" src="{{ '/api/files/' . $product->image->file_path }}" height="250"
                                    alt="" />
                                <img class="second-img" src="{{ '/api/files/' . $product->image->file_path }}" height="250"
                                    alt="" />
                            </a>
                        </div>
                        <ul class="product-flag">
                            <li class="new">Trả góp 0%</li>
                        </ul>
                        <div class="product-decs">
                            <h2><a href="/home/pages/productdetail/{{ $product->id }}"
                                    class="product-link">{{ $product->name }}</a>
                            </h2>
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="current-price">
                                        {{ number_format($product->details->min('out_price'), 0, ',', '.') }} </li>
                                    </li>
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
                @endforeach
            </div>
            <!-- Best Sells Carousel End -->
        </div>
    </section>
<!-- Sản phẩm mới-->

<!-- Banner Area 2 End -->

@endsection
