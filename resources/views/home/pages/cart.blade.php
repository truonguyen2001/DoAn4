@extends('home/layout/layout')
@section('title')
    Giỏ hàng
@endsection
@section('page-title')
    Giỏ hàng
@endsection
@section('main-content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Cart</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="/home">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="cart-main-area mtb-60px">
    <div class="container">
        <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="c in cart track by $index">
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="w-100" ng-if="c.product.image" alt=""
                                            src="@{{ baseUrl + '/api/files/' + c.product.image.file_path }}" ></a>
                                    </td>
                                    <td class="product-name">@{{ c.product.product.name }}</td>
                                    <td class="product-price-cart"><span class="amount">@{{ c.product.out_price | number }}đ</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                        <div class="inc qtybutton">+</div></div>
                                    </td>
                                    <td class="product-subtotal">@{{ c.product.out_price | number }}đ</td>
                                    <td class="product-remove">
                                        <a href="#"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="#"><i ng-click="deleteCart(c.product, c.quantity)" class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="/home/pages/shop">Tiếp tục mua sắm</a>
                                    <a href="#" class="primary-btn cart-btn cart-btn-right" style="opacity: 0;"><span class="icon_loading"></span>Update Cart</a>
                                </div>
                                <div class="cart-clear">
                                    <a ng-click="deleteCart(c.product, c.quantity)" href="#">Xóa giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Ước tính vận chuyển và thuế</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Nhập điểm đến của bạn để có được ước tính vận chuyển.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Tỉnh
                                        </label>
                                        <select class="email s-email s-wid" style="display: none;">
                                            <option>Hà Nội</option>
                                            <option>Hưng Yên</option>
                                            <option>Hải Phòng</option>
                                            <option>Hồ Chí Minh</option>
                                        </select><div class="nice-select email s-email s-wid" tabindex="0">
                                            <span class="current">Hà Nội</span>
                                            <ul class="list">
                                                <li data-value="HaNoi" class="option selected">Hà Nội</li>
                                                <li data-value="HungYen" class="option selected">Hưng Yên</li>
                                                <li data-value="HaiPhong" class="option selected">Hải Phòng</li>
                                                <li data-value="HoChiMinh" class="option selected">Hồ Chí Minh</li>
                                            </ul></div>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Quận / Huyện
                                        </label>
                                        <select class="email s-email s-wid" style="display: none;">
                                            <option>Cầu Giấy</option>
                                            <option>Yên Mỹ</option>
                                            <option>Thành phố Hải Phòng</option>
                                            <option>Quận 1</option>
                                        </select><div class="nice-select email s-email s-wid" tabindex="0">
                                            <span class="current">Cầu Giấy</span>
                                            <ul class="list">
                                                <li data-value="CauGiay" class="option selected">Cầu Giấy</li>
                                                <li data-value="YenMy" class="option selected">Yên Mỹ</li>
                                                <li data-value="TPHaiPhong" class="option selected">Thành phố Hải Phòng</li>
                                                <li data-value="Quan1" class="option selected">Quận 1</li>
                                            </ul></div>
                                    </div>
                                    <div class="tax-select mb-25px">
                                        <label>
                                            * Xã / Phường
                                        </label>
                                        <input type="text">
                                    </div>
                                    <button class="cart-btn-2" type="submit">Nhận báo giá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Sử dụng phiếu giảm giá</h4>
                            </div>
                            <div class="discount-code">
                                <p>Nhập mã phiếu giảm giá của bạn (nếu có).</p>
                                <form>
                                    <input type="text" required="" name="name">
                                    <button class="cart-btn-2" type="submit">Áp dụng phiếu giảm giá</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Tổng giỏ hàng</h4>
                            </div>
                            <h5>Tổng giá trị đơn hàng <span>@{{ totalCart | number }}đ</span></h5>
                            <div class="total-shipping">
                                <h5>Tổng phí giao hàng</h5>
                                <ul>
                                    <li><input type="checkbox"> Standard <span>0 VNĐ</span></li>
                                    <li><input type="checkbox"> Express <span>0 VNĐ</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Tổng đơn <span>@{{ totalCart | number }}đ</span></h4>
                            <a href="#">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="/assets/home/js/homeController.js"></script>
    <script src="/assets/home/js/appController.js"></script>
@endsection