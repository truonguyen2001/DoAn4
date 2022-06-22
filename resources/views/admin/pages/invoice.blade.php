@extends('admin/layout/admin-layout')
@section('title')
    Admin - Hóa đơn
@endsection
@section('page-title')
    Đơn đặt hàng
@endsection
@section('main-content')
    <div ng-app="myApp" ng-controller="myController">
        <div class="mb-3 border-1 rounded-1 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/admin/invoice/create">
                Thêm
            </a>
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" ng-model="searchValue"
                        aria-label="Tìm kiếm" aria-describedby="button-addon2">
                    <button ng-click="search()" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                    </button>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th style="cursor: pointer;" ng-repeat="f in fields | visible" ng-click="order(f)" scope="col">
                        @{{ f.display }}
                    </th>
                    <th style="cursor: default;"></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in data">
                    <th scope="row">@{{ $index + 1 }}</th>
                    <td ng-repeat="f in fields | visible">
                        <span ng-if="f.type != 'file' && f.type != 'editor' && f.type != 'number'">
                            @{{ item | value: f.field }}</span>
                        <span ng-if="f.type == 'number'"> @{{ item | value: f.field | number }}</span>
                        <div ng-bind-html="item[f.field]" ng-if="f.type == 'editor'" class="ql-contaienr">
                        </div>
                        <img height="100" ng-if="f.type == 'file'" src="@{{baseUrl}}/api/files/@{{ item | value: f.field }}" />
                    </td>
                    <td>
                        <button ng-click="showEdit(item)" type="button" class="btn btn-info m-1" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button ng-click="showDelete(item.id)" type="button" class="btn btn-danger m-1"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li ng-class="page > 1? 'page-item': 'page-item disabled'"><a class="page-link"
                        ng-click="loadPage(page - 1)" style="cursor: pointer;">Trước</a>
                </li>
                <li ng-class="i == page ? 'page-item active' : 'page-item'"
                    ng-repeat="i in [] | page: page : totalRecords: limit"><a class="page-link"
                        style="cursor: pointer;" ng-click="loadPage(i)">@{{ i }}</a></li>
                <li ng-class="page < totalRecords / limit? 'page-item': 'page-item disabled'"><a class="page-link"
                        style="cursor: pointer;" ng-click="loadPage(page + 1)">Sau</a>
                </li>
            </ul>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> @{{ deleting ? 'Xác nhận' : 'Thông tin loại sản phẩm ' }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div ng-if="deleting">
                            Bạn có chắc chắn muốn xóa hóa đơn?
                        </div>
                        <div ng-if="!deleting" class="container-fluid">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-12 form-group">
                                    <label for="select" class="form-label fw-bold">Trạng thái</label>
                                    <select class="form-control" id="select" data-ng-options="o.name for o in status" class="form-select"
                                        data-ng-model="selectedStatus"></select>
                                </div>
                                <div ng-repeat="f in fields | editable" ng-class="f.type != 'editor' ? 'col-md-6' : ''"
                                    class="form-group mb-3 col-12">
                                    <label for="@{{ f.field }}"
                                        class="form-label fw-bold">@{{ f.display }}</label>
                                    <input ng-if="f.type != 'editor' && f.type != 'file'" id="@{{ f.field }}"
                                        class="@{{ f.type != 'checkbox' ? 'form-control' : 'form-check-input' }}"  type="text"
                                        ng-model="item[f.field]" />
                                    <input ng-if="f.type == 'file'" id="@{{ f.field }}" class="form-control"
                                        type="@{{ f.type }}" file-model="file" />
                                    <div ng-if="f.type == 'editor'" class="editor">
                                    </div>
                                </div>
                                <div class="g-0 col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <table class="table table-striped table-active">
                                        <thead class="table-danger">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Kích thước</th>
                                                <th>Màu sắc</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền</th>
                                                <th>Tổng số</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="i in inoivceDetails">
                                                <td>@{{ i.productDetail.product.name }}</td>
                                                <td>@{{ i.productDetail.size }}</td>
                                                <td>@{{ i.productDetail.color }}</td>
                                                <td>@{{ i.quantity }}</td>
                                                <td>@{{ i.price |number }}đ</td>
                                                <td>@{{ i.price * i.quantity |number }}đ</td>
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
                            ng-click="save()">@{{ deleting ? "Xác nhận" : "Lưu" }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/admin/js/invoiceExtend.js"></script>
    <script src="/assets/admin/js/appController.js"></script>
@endsection