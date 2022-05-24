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
                                <img class="zoompro" src="/api/files/{{ $product->image->file_path }}"
                                    data-zoom-image="/api/files/{{ $product->image->file_path }}" alt="" />
                            </div>
                        </div>
                        <div id="gallery" class="product-dec-slider-2">
                            <a data-image="/api/files/{{ $product->image->file_path }}"
                                data-zoom-image="/api/files/{{ $product->image->file_path }}">
                                <img src="/api/files/{{ $product->image->file_path }}" alt="" />
                            </a>
                            @foreach ($product->details as $item)
                                @if ($item->image != null)
                                    <a data-image="/api/files/{{ $item->image->file_path }}"
                                        data-zoom-image="/api/files/{{ $item->image->file_path }}">
                                        <img src="/api/files/{{ $item->image->file_path }}" alt="" />
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h2> {{ $product->name }} </h2>
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
                                <li class="old-price not-cut">
                                    {{ number_format($product->details->min('out_price'), 0, ',', '.') }} 
                                </li>
                            </ul>
                        </div>
                        <p>{!! $product->description !!}</p><br>
                        <div class="pro-details-quality mt-0px">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#"> + Add To Cart</a>
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
                @foreach($products as $product)
                <article class="list-product">
                    <div class="img-block">
                        <a href="/home/pages/productdetail/{{$product->id}}" class="thumbnail">
                            <img class="first-img" src="{{ '/api/files/' . $product->image->file_path }}" alt="" />
                            <img class="second-img" src="{{ '/api/files/' . $product->image->file_path }}" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">Trả góp 0%</li>
                    </ul>
                    <div class="product-decs">
                        <h2><a href="/home/pages/productdetail/{{$product->id}}" class="product-link">{{ $product->name }}</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="current-price">{{ number_format($product->details->min('out_price'), 0, ',', '.') }} </li>
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
                <!-- Single Item -->
                {{-- <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-14.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-14.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quil...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price">€35.90</li>
                                <li class="current-price">€34.21</li>
                                <li class="discount-price">-5%</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-22.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-23.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrai...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€29.90</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-9.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-9.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.html" class="product-link">New Balance Arishi Spo...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€29.90</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-18.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-18.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                        <h2><a href="single-product.html" class="product-link">Calvin Klein Jeans Refle...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€29.90</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-7.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-8.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.html" class="product-link">Madden by Steve Madd...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price">€12.90</li>
                                <li class="current-price">€10.21</li>
                                <li class="discount-price">-10%</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-17.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-16.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.html" class="product-link">Trans-Weight Hooded...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€11.90</li>
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
                <!-- Single Item -->
                <article class="list-product">
                    <div class="img-block">
                        <a href="single-product.html" class="thumbnail">
                            <img class="first-img" src="assets/images/product-image/organic/product-9.jpg" alt="" />
                            <img class="second-img" src="assets/images/product-image/organic/product-9.jpg" alt="" />
                        </a>
                        <div class="quick-view">
                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="product-flag">
                        <li class="new">New</li>
                    </ul>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                        <h2><a href="single-product.html" class="product-link">Water and Wind Resist...</a></h2>
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">€11.90</li>
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
                </article> --}}
                <!-- Single Item -->
            </div>
            <!-- Recent product slider end -->
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img class="zoompro" src="/api/files/{{ $product->image->file_path }}"
                                    data-zoom-image="/api/files/{{ $product->image->file_path }}" alt="" />
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="/api/files/{{ $product->image->file_path }}" alt="" />
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    @foreach ($product->details as $item)
                                @if ($item->image != null)
                                    <a data-image="/api/files/{{ $item->image->file_path }}"
                                        data-zoom-image="/api/files/{{ $item->image->file_path }}">
                                        <img src="/api/files/{{ $item->image->file_path }}" alt="" />
                                    </a>
                                @endif
                            @endforeach
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav owl-nav-style owl-nav-style-2" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product-image/organic/product-11.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="assets/images/product-image/organic/product-9.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="assets/images/product-image/organic/product-20.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="assets/images/product-image/organic/product-19.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>{{ $product->name }}</h2>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">{{ number_format($product->details->min('out_price'), 0, ',', '.') }} </li>
                                    </ul>
                                </div>
                                <p>{!! $product->description !!}</p>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
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
            </div>
        </div>
    </div>
@endsection
