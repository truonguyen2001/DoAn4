@extends('home/layout/layout')
@section('title')
    Checkout
@endsection
@section('page-title')
    Checkout
@endsection
@section('main-content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Checkout</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="/home">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Chi tiết thanh toán</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <label>Họ & Tên</label>
                                <input ng-model="customer.name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-20px">
                                <label>Tỉnh</label>
                                <input ng-model="customer.province" class="billing-address" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <label>Quận / Huyện</label>
                                <input ng-model="customer.district" class="billing-address" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <label>Xã / Phường </label>
                                <input ng-model="customer.commune" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <label></label>
                                <input  ng-model="customer.address" placeholder="Địa chỉ cụ thể" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20px">
                                <label>Số điện thoại</label>
                                <input  ng-model="customer.phone" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20px">
                                <label>Địa chỉ Email</label>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="checkout-account mb-50px">
                        <input class="checkout-toggle2" type="checkbox">
                        <label>Tạo tài khoản mới?</label>
                    </div>
                    <div class="checkout-account-toggle open-toggle2 mb-30">
                        <input placeholder="Email address" type="email">
                        <input placeholder="Password" type="password">
                        <button class="btn-hover checkout-btn" type="submit">Đăng ký</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Sản phẩm</li>
                                    <li>Đơn giá</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    <li ng-repeat="c in cart track by $index"><span class="order-middle-left">@{{c.product.product.name}}</span> <span class="order-price"> @{{ c.product.out_price | number }}VND </span></li>
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Tổng tiền</li>
                                    <li>@{{ totalCart | number }}VND</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="Place-order mt-25">
                        <a ng-click="saveInvoice()" class="btn-hover" href="#">Đặt hàng</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="/assets/home/js/checkoutController.js"></script>
    <script src="/assets/home/js/appController.js"></script>
@endsection
