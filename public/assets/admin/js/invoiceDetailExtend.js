const route = "invoice-detail";
extendController = ($scope, $http) => {
    // $scope.name = '';
    // $scope.visible = true;
    $scope.fields = [        
        { hidden: false, field: "invoice_id", display: "Mã hóa đơn", default: 0, type: "int", },
        { hidden: false, field: "product_detail_id", display: "Mã sản phẩm", default: "", type: "int", readonly: true, },
        { hidden: false, field: "quantity", display: "Số lượng", default: "", type: "text", },
        { hidden: false, field: "price", display: "Đơn giá", default: "", type: "text", },
    ];
    $scope.id = 0;
    $scope.item = {};
    $scope.selectedProduct = {};
    for (let field of $scope.fields.filter((v) => !v.readonly)) {
        $scope.item[field.field] = field.default;
    }
    const idInput = document.getElementById("product_id");
    $scope.extendQuerys =
        "with_product=true&" + (idInput ? "product_id=" + idInput.value : "");
    $scope.showEdit = (item) => {
        const file = document.getElementById("default_image.file_path");
        if (file != null) value = "";
        $scope.id = item.id;
        $scope.selectedProduct =
            $scope.products.find((v) => v.id == item.product.id) ?? {};
        for (let field of $scope.fields.filter((v) => !v.readonly)) {
            $scope.item[field.field] = item[field.field];
        }
        $scope.editting = true;
        $scope.formVisible = true;
        $scope.deleting = false;
    };

    // $scope.showAddNew = () => {
    //     for (let field of $scope.fields.filter((v) => !v.readonly)) {
    //         $scope.item[field.field] = field.default;
    //     }
    //     const file = document.getElementById("default_image.file_path");
    //     if (file != null) value = "";
    //     $scope.editting = false;
    //     $scope.deleting = false;
    // };
    $scope.save = () => {
        const fileE = document.getElementById("default_image.file_path");
        let file;
        if (fileE != null) file = fileE.files[0];
        let item = {};
        for (let field of $scope.fields.filter((v) => !v.readonly)) {
            item[field.field] = $scope.item[field.field];
        }
        item.product_id = productId;
        if (file != undefined && file != null) {
            $scope.upLoadFile(file, "/api/upload").then((res) => {
                if (res.data.status == true) {
                    item.default_image = res.data.data.id;
                }
                if ($scope.editting) {
                    $scope.update($scope.id, item);
                } else if ($scope.deleting) {
                    $scope.delete($scope.id);
                } else {
                    $scope.create(item);
                }
            });
        } else {
            if ($scope.editting) {
                $scope.update($scope.id, item);
            } else if ($scope.deleting) {
                $scope.delete($scope.id);
            } else {
                $scope.create(item);
            }
        }
    };
    $scope.showDelete = (id) => {
        $scope.id = id;
        $scope.deleting = true;
    };
    $scope.products = [];
    $http.get("/api/admin/products?page=1&limit=1000").then((res) => {
        if (res.data.status == true) {
            $scope.products = res.data.data;
        }
    });
    $scope.change = () => {
        console.log($scope.file);
    };
};

function formSubmit(e) {
    description.value = editor.getData();
}

const description = document.getElementById('product_description');
const productForm = document.getElementById("product_form");
productForm.addEventListener("submit", formSubmit);
