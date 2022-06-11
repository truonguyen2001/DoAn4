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
    <section class="static-area mtb-60px">
        <div class="container">
            <!-- Section Title Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới</h2>
                    </div>
                </div>
            </div>
            <!-- Section Title End -->
            <!-- Best Sell Slider Carousel Start -->
            <div class="best-sell-slider owl-carousel owl-nav-style">
                <!-- Single Item -->

                <article ng-repeat="product in data.slice(0,10)" class="list-product">
                    <div class="img-block">
                        <a href="/home/pages/productdetail/@{{ product.id }}" class="thumbnail">
                            <img class="first-img" src="@{{baseUrl + '/api/files/' + product.image.file_path }}" height="250" alt="" />
                            <img class="second-img" src="@{{baseUrl + '/api/files/'+ product.image.file_path }}" height="250" alt="" />
                        </a>
                    </div>
                    <ul class="product-flag">
                        <li class="new">Trả góp 0%</li>
                    </ul>
                    <div class="product-decs">
                        <h2><a href="/home/pages/productdetail/@{{ product.id }}"
                                class="product-link">@{{ product.name }}</a>
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
                                    @{{ product.min_price | number }}đ
                                </li>
                                <li class="discount-price">New</li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-link">
                        <ul>
                            <li class="cart"><a class="cart-btn" ng-click="product.default_detail.product = product;addCart(product.default_detail)"
                                    href="#"><i class="fa fa-shopping-cart"></i> </a></li>
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
            <!-- Best Sells Carousel End -->
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
                <article ng-repeat="product in data" class="list-product">
                    <div class="img-block">
                        {{-- <a href="/home/pages/productdetail/@{{ product.id }}" class="thumbnail">
                            <img class="first-img" src="@{{ '/api/files/'.product.image.file_path }}" height="250" alt="" />
                            <img class="second-img" src="@{{ '/api/files/'.product.image.file_path }}" height="250" alt="" />
                        </a> --}}
                        <a href="/home/pages/productdetail/@{{ product.id }}" class="thumbnail">
                            <img class="first-img" src="@{{baseUrl + '/api/files/' + product.image.file_path }}" height="250" alt="" />
                            <img class="second-img" src="@{{baseUrl + '/api/files/'+ product.image.file_path }}" height="250" alt="" />
                        </a>
                    </div>
                    <ul class="product-flag">
                        <li class="new">Trả góp 0%</li>
                    </ul>
                    <div class="product-decs">
                        <h2><a href="/home/pages/productdetail/@{{ product.id }}"
                                class="product-link">@{{ product.name }}</a>
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
                                    @{{ product.min_price | number }}đ
                                </li>
                                <li class="old-price">€18.90</li>
                                <li class="discount-price">New</li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-link">
                        <ul>
                            <li class="cart"><a class="cart-btn" ng-click="product.default_detail.product = product;addCart(product.default_detail)"
                                    href="#"><i class="fa fa-shopping-cart"></i> </a></li>
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
            <!-- Best Sells Carousel End -->
        </div>
    </section>
    <!-- Sản phẩm mới-->

    <!-- Banner Area 2 End -->
@endsection
@section('scripts')
    <script src="/assets/home/js/homeController.js"></script>
    <script src="/assets/home/js/appController.js"></script>
@endsection
