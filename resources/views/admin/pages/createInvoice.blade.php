@extends('admin/layout/admin-layout')
@section('title')
    Admin - Sản phẩm
@endsection
@section('page-title')
    Sản phẩm
@endsection
@section('main-content')
    <div ng-app="myApp" ng-controller="myController">
        <input type="hidden" id="product_id">
        <div class="container">
            <form id="product_form" ng-submit='saveInovoice()' class="d-flex flex-column">
                @csrf
                <div class="ms-auto">
                    <label class="btn btn-success" for="save">Lưu</label>
                    <input type="submit" class="d-none" id="save" value="save">
                </div>
                <div class="row">
                    <div class="mb-3 fw-bold form-group col-12 col-md-6">
                        <label for="" class="mb-1">Tên khách hàng</label>
                        <input class="form-control" type="text" name="customer_name" ng-model="invoice.customer_name">
                    </div>
                    <div class="mb-3 fw-bold form-group col-12 col-md-6">
                        <label for="" class="mb-1">Số điện thoại</label>
                        <input class="form-control" type="text" name="phone_number" ng-model="invoice.phone_number">
                    </div>
                    <div class="mb-3 fw-bold form-group col-12">
                        <label for="" class="mb-1">Địa chỉ</label>
                        <input class="form-control" type="text" name="address"ng-model="invoice.address">
                    </div>
                    <div class="mb-3 col-md-6 col-12">
                        <label for="select" class="form-label fw-bold">Trạng thái</label>
                        <select id="select" data-ng-options="o.name for o in status" class="form-select"
                            data-ng-model="selectedStatus"></select>
                    </div>
                    <div class="mb-3 fw-bold form-group col-12 col-md-6">
                        <label for="" class="mb-1">Đã thanh toán</label>
                        <input class="form-control" type="number" name="paid" value="0" ng-model="invoice.paid">
                    </div>
                    <div class="mb-3 fw-bold form-group col-12 col-md-6">
                        <label for="">Tổng tiền</label>
                        <input readonly class="form-control" type="text" ng-model="invoice.total" name="total">
                    </div>
                </div>
            </form>
        </div>
        <div class="mb-3 border-1 rounded-1 d-flex justify-content-between">
            <button ng-click="showAddNew()" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Thêm
            </button>
            {{-- <div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" ng-model="searchValue"
                        aria-label="Tìm kiếm" aria-describedby="button-addon2">
                    <button ng-click="search()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                    </button>
                </div>
            </div> --}}
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th style="cursor: pointer;" ng-repeat="f in fields | visible" ng-click="order(f.field)" scope="col">
                        @{{ f.display }}
                    </th>
                    <th style="cursor: default;"></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in details">
                    <th scope="row">@{{ $index + 1 }}</th>
                    <td ng-repeat="f in fields | visible">
                        <span ng-if="f.type != 'file' && f.type != 'editor'"> @{{ item | value: f.field }}</span>
                        <div ng-bind-html="item[f.field]" ng-if="f.type == 'editor'" class="ql-contaienr">
                        </div>
                        <img height="100" ng-if="f.type == 'file'" src="@{{baseUrl}}/api/files/@{{ item | value: f.field }}" />
                    </td>
                    <td>
                        <button ng-click="showDelete($index)" type="button" class="btn btn-danger m-1"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> @{{ deleting ? 'Xác nhận' : 'Thông tin loại sản
phẩm ' }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div ng-if="deleting">
                            Bạn có chắc chắn muốn xóa chi tiết hóa đơn?
                        </div>
                        <div ng-if="!deleting" class="container-fluid">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Số lượng</span>
                                    <input ng-model="newDetail.quantity" type="number" class="form-control">
                                </div>
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th scope="col">STT</th>
                                                <th style="cursor: pointer;" ng-click="order('product_id')"
                                                    scope="col">
                                                    Tên sản phẩm
                                                </th>
                                                <th scope="col" style="cursor: pointer;" ng-click="order('color')">
                                                    Màu sắc
                                                </th>
                                                <th scope="col" style="cursor: pointer;" ng-click="order('size')">
                                                    Kích thước
                                                </th>
                                                <th scope="col" style="cursor: pointer;" ng-click="order('out_price')">
                                                    Giá bán
                                                </th>
                                                <th scope="col" style="cursor: pointer;" ng-click="order('remaining_quantity')">
                                                    Số lượng còn
                                                </th>
                                                <th scope="col">
                                                    Ảnh
                                                </th>
                                                <th scope="col" style="cursor: pointer;" ng-click="order('unit')">
                                                    ĐVT
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr onclick="rowSelect(event)" ng-repeat="item in data">
                                                <th><input type="radio" name="" id="@{{item.id}}" value="@{{item.id}}"></th>
                                                <th scope="row" class="ng-binding">1</th>
                                                <td>
                                                    <span>
                                                        @{{ item.product.name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        @{{ item.color }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        @{{ item.size }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        @{{ item.out_price | number }}đ
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        @{{ item.remaining_quantity | number }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <img height="100px" ng-if="item.default_image" src="@{{baseUrl}}/api/files/@{{ item.default_image.file_path }}" alt="">
                                                </td>
                                                <td>
                                                    <span>
                                                        @{{ item.unit }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" aria-label="Close" class="btn btn-secondary" data-bs-dismiss="modal">Hủy
                        </button>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary"
                        ng-click="save()">@{{ deleting ? 'Xóa' : 'Thêm' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
    <script src="/assets/admin/js/createInvoice.js"></script>
    <script src="/assets/admin/js/appController.js"></script>
@endsection