const route = "product-details";
extendController = ($scope, $http) => {
    // $scope.name = '';
    // $scope.visible = true;
    $scope.status = [
        {
            name: "Đang duyệt",
            id: 0
        },
        {
            name: "Đã duyệt",
            id: 1
        },
        {
            name: "Đang giao",
            id: 2
        },
        {
            name: "Từ chối",
            id: 3
        }, {
            name: "Hoàn thành",
            id: 4
        },
    ];

    $scope.fields = [
        {
            hidden: false,
            field: "productDetail.product.name",
            display: "Tên sản phẩm",
            default: "",
            type: "text",
            readonly: true
        },
        {
            hidden: false,
            field: "productDetail.color",
            display: "Màu sắc",
            default: "",
            readonly: true,
            type: "text"
        },
        {
            hidden: false,
            field: "productDetail.size",
            display: "Kích thước",
            default: "",
            readonly: true,
            type: "text"
        },
        {
            hidden: false,
            field: "productDetail.out_price",
            display: "Giá bán",
            default: 0,
            readonly: true,
            type: "number"
        }, {
            hidden: false,
            field: "quantity",
            display: "Số lượng",
            default: "",
            type: "text"
        }, {
            hidden: false,
            field: "productDetail.remaining_quantity",
            display: "Số lượng còn",
            default: "",
            readonly: true,
            type: "text"
        }, {
            hidden: false,
            field: "productDetail.default_image.file_path",
            display: "Ảnh",
            default: "",
            type: "file",
            readonly: true
        }, {
            hidden: false,
            field: "productDetail.unit",
            display: "ĐVT",
            default: "",
            readonly: true,
            type: "text"
        },
    ];

    $scope.invoice = {
        total: 0
    };
    $scope.id = 0;
    $scope.item = {};
    $scope.selectedStatus = $scope.status[0];
    $scope.selectedProduct = {};
    for (let field of $scope.fields.filter((v) => !v.readonly)) {
        $scope.item[field.field] = field.default;
    }
    const idInput = document.getElementById("product_id");
    $scope.extendQuerys = "with_detail=true";
    $scope.showAddNew = () => {
        $scope.newDetail = {};
        document.querySelectorAll("tr input[type=radio]").forEach((i) => {
            i.checked = false;
        });
        $scope.editting = false;
        $scope.deleting = false;
    };
    $scope.save = () => {
        if ($scope.deleting) {
            const detail = $scope.details[$scope.id];
            $scope.invoice.total -= detail.quantity * detail.productDetail.out_price;
            $scope.details.splice($scope.id, 1);
        } else {
            $scope.addDetail();
        }
    };
    $scope.saveInovoice = () => {
        const url = $scope.baseUrl + "/api/admin/invoices";
        $scope.invoice.status = $scope.selectedStatus ?. id;
        $http.post(url, $scope.invoice).then((res) => {
            if (res.data.status == true) {
                const id = res.data.data;
                const addDetailUrl = $scope.baseUrl + "/api/admin/invoice-details";
                let sent = 0;
                $scope.details.forEach((detail) => {
                    sent++;
                    $http.post(addDetailUrl, {
                        product_detail_id: detail.product_detail_id,
                        invoice_id: id,
                        quantity: detail.quantity
                    }).then(res => {
                        sent --;
                        if (sent == 0) {
                            alert("Thêm hóa đơn thành công.");
                            window.location.href = "/admin/invoice";
                        }
                    });
                });

            }
        });
    };
    $scope.showDelete = (id) => {
        $scope.id = id;
        $scope.deleting = true;
    };
    $scope.details = [];
    $scope.newDetail = {};
    $scope.addDetail = () => {
        const radio = document.querySelector("tr input[type=radio]:checked");
        const id = radio.value;
        if ($scope.newDetail.quantity && radio != null) {
            const productDetail = $scope.data.find((i) => {
                return i.id == id;
            });
            $scope.details.push({productDetail: productDetail, product_detail_id: id, quantity: $scope.newDetail.quantity, price: productDetail.out_price});
            $scope.invoice.total += productDetail.out_price * $scope.newDetail.quantity;
        }
    };
};

function rowSelect(e) {
    e.currentTarget.children[0].children[0].checked = true;
}
