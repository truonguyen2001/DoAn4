<?php
use App\Models\Category;
$categories = Category::all();
?>

<header class="main-header">
    <div class="header-navigation sticky-nav">
        <div class="container-fluid">
            <div class="row">
                <!-- Logo Start -->
                <div class="col-md-2 col-sm-2">
                    <div class="logo">
                        <a href="/home"><img src="/assets/home/images/Logo-title3.jpg" alt="logo.jpg" /></a>
                    </div>
                </div>
                <!-- Logo End -->
                <!-- Navigation Start -->
                <div class="col-md-10 col-sm-10">
                    <!--Main Navigation Start -->
                    <div class="main-navigation d-none d-lg-block">
                        <ul>
                            <li class="menu-dropdown">
                                <a href="/home">Home </a>
                            </li>
                            <li class="menu-dropdown">
                                <a href="#">Sản phẩm <i class="ion-ios-arrow-down"></i></a>
                                <ul class="mega-menu-wrap">
                                    @foreach ($categories as $key => $item)
                                        @if ($key % 5 == 0)
                                            <li>
                                                <ul>
                                                    {{-- <li class="mega-menu-title"><a href="#">Shop Grid</a></li> --}}
                                                    <li><a href="{{ route('shop-list', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                        @elseif ($key % 5 == 4 || $key == count($categories) - 1)
                                                <li><a href="{{ route('shop-list', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li><a href="{{ route('shop-list', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-dropdown">
                                <a href="#">Trang <i class="ion-ios-arrow-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="/home/pages/cart">Giỏ hàng</a></li>
                                    <li><a href="/home/pages/checkout">Trang thanh toán</a></li>
                                    <li><a href="/home/pages/login">Login & Regiter</a></li>
                                </ul>
                            </li>
                            <li class="menu-dropdown">
                                <a href="#">Blog <i class="ion-ios-arrow-down"></i></a>
                                <ul class="sub-menu">
                                    <li class="menu-dropdown position-static">
                                        <a href="#">Blog Grid <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu sub-menu-2">
                                            <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                            <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-dropdown position-static">
                                        <a href="#">Blog List <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu sub-menu-2">
                                            <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                            <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-dropdown position-static">
                                        <a href="#">Blog Single <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu sub-menu-2">
                                            <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a>
                                            </li>
                                            <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/home/pages/contact">Liên hệ</a></li>
                        </ul>
                    </div>
                    <!--Main Navigation End -->
                    <!--Header Bottom Account Start -->
                    <div class="header_account_area">
                        <!--Seach Area Start -->
                        <div class="header_account_list search_list">
                            <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                            <div class="dropdown_search">
                                <form action="#">
                                    <input placeholder="Search entire store here ..." type="text" />

                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--Seach Area End -->
                        <!--Contact info Start -->
                        <div class="contact-link">
                            <div class="phone">
                                <p>Call us:</p>
                                <a href="tel:(+84)375256601">(+84)375256601</a>
                            </div>
                        </div>
                        <!--Contact info End -->
                        <!--Cart info Start -->
                        <div class="cart-info d-flex">
                            <div class="mini-cart-warp">
                                <a href="#" class="count-cart"><span></span></a>
                                <div class="mini-cart-content">
                                    <ul>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="single-product.html"><img alt=""
                                                        src="/assets/home/images/product-image/mini-cart/1.jpg" /></a>
                                                <span class="product-quantity">1x</span>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="single-product.html">Juicy Couture...</a></h4>
                                                <span>$9.00</span>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion-android-cancel"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="single-product.html"><img alt=""
                                                        src="/assets/home/images/product-image/mini-cart/2.jpg" /></a>
                                                <span class="product-quantity">1x</span>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="single-product.html">Water and Wind...</a></h4>
                                                <span>$11.00</span>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="ion-android-cancel"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <h4>Subtotal : <span>$20.00</span></h4>
                                        <h4>Shipping : <span>$7.00</span></h4>
                                        <h4>Taxes : <span>$0.00</span></h4>
                                        <h4 class="shop-total">Total : <span>$27.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-btn text-center">
                                        <a class="default-btn" href="checkout.html">checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header Bottom Account End -->
</header>
