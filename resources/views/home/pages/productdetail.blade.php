@extends('home/layout/layout')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('page-title')
    Chi tiết sản phẩm
@endsection
@section('main-content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-hrading">Product Detail Page</h1>
                        <ul class="breadcrumb-links">
                            <li><a href="/home">Home</a></li>
                            <li>Product Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-img product-details-tab">
                        <div class="zoompro-wrap zoompro-2">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" src="/api/files/@{{ product.image.file_path }}"
                                    data-zoom-image="/api/files/@{{ product.image.file_path }}" alt="" />
                            </div>
                        </div>
                        <div id="gallery" class="product-dec-slider-2">
                            <a data-image="/api/files/@{{ product.image.file_path }}"
                                data-zoom-image="/api/files/@{{ product.image.file_path }}">
                                <img src="/api/files/@{{ product.image.file_path }}" alt="" />
                            </a>
                            <a ng-repeat="item in product.details" data-image="/api/files/@{{ item.image.file_path }}"
                                data-zoom-image="/api/files/@{{ item.image.file_path }}">
                                <img src="/api/files/@{{ item.image.file_path }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h2> @{{ product.name }} </h2>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                                <i class="ion-android-star"></i>
                            </div>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                {{-- <li class="old-price">
                                    @{{ product.min_price * 1.05 | number }}VND
                                </li>
                                <li class="old-price not-cut"> - </li> --}}
                                <li class="old-price not-cut">
                                    @{{ price | number }} VND
                                </li>
                            </ul>
                        </div>
                        <p></p><br>
                        <div class="pro-details-quality mt-0px">
                            <div class="cart-plus-minus">
                                <input ng-model="quantity" class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#" ng-click="addCart(detail, quantity)"> <i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-details-wish-com">
                            <div class="pro-details-wishlist">
                                <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                            </div>
                            <div class="pro-details-compare">
                                <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                            </div>
                        </div>
                        <div class="pro-details-social-info">
                            <span>Share</span>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="description-review-area mb-60px">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-toggle="tab" href="#des-details1">Thông số kỹ thuật</a>
                    <a class="active" data-toggle="tab" href="#des-details2">Chi tiết sản phẩm</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div ng-bind-html="product.description" class="product-anotherinfo-wrapper">
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane">
                        <div class="product-description-wrapper">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="recent-add-area mt-30 mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>Sản phẩm tương tự</h2>
                    </div>
                    <!-- Section Title -->
                </div>
            </div>
            <!-- Recent Product slider Start -->
            <div class="recent-product-slider owl-carousel owl-nav-style">
                <!-- Single Item -->
                <article ng-repeat="item in data" class="list-product">
                    <div class="img-block">
                        <a href="/home/pages/productdetail/@{{ item.id }}" class="thumbnail">
                            <img class="first-img" src="@{{ '/api/files/' + item.image.file_path }}" alt="" />
                            <img class="second-img" src="@{{ '/api/files/' + item.image.file_path }}" alt="" />
                        </a>
                    </div>
                    <ul class="product-flag">
                        <li class="new">Trả góp 0%</li>
                    </ul>
                    <div class="product-decs">
                        <h2><a href="/home/pages/productdetail/@{{ item.id }}"
                                class="product-link">@{{ item.name }}</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price">
                                    @{{ item.min_price * 1.05 | number }}VND
                                </li>
                                <li class="current-price">
                                    @{{ item.min_price | number }}VND
                                </li>
                                <li class="discount-price">New</li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-to-link">
                        <ul>
                            <li class="cart"><a class="cart-btn"
                                    ng-click="addCart(item.default_detail)" href="#"><i
                                        class="fa fa-shopping-cart"></i> </a></li>
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
            <!-- Recent product slider end -->
        </div>
    </section>
@endsection
@section('scripts')
    <script src="/assets/home/js/productDetailController.js"></script>
    <script src="/assets/home/js/appController.js"></script>
@endsection
