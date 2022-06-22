const route = "invoices";
extendController = ($scope, $http) => {
    // $scope.name = '';
    // $scope.visible = true;
    $scope.status = [
        { name: "Đang duyệt", id: 0 },
        { name: "Đã duyệt", id: 1 },
        { name: "Đang giao", id: 2 },
        { name: "Từ chối", id: 3 },
        { name: "Hoàn thành", id: 4 },
    ];
    $scope.fields = [
        {
            hidden: false,
            field: "customer_name",
            display: "Tên khách hàng",
            default: "",
            type: "text",
            readonly: false,
        },
        {
            hidden: false,
            field: "phone_number",
            display: "Số điện thoại",
            default: "",
            type: "text",
            readonly: false,
        },
        {
            hidden: false,
            field: "address",
            display: "Địa chỉ",
            default: "",
            type: "text",
            readonly: false,
        },
        {
            hidden: false,
            field: "status_name",
            display: "Trạng thái",
            default: "",
            type: "text",
            readonly: true,
        },
        {
            hidden: false,
            field: "paid",
            display: "Đã thanh toán",
            default: 0,
            type: "number",
        },
        {
            hidden: false,
            field: "total",
            display: "Tổng tiền",
            default: 0,
            type: "number",
            readonly: true,
        },
        {
            hidden: false,
            field: "created_at",
            display: "Ngày tạo",
            default: "",
            type: "text",
            readonly: true,
        },
        {
            hidden: false,
            field: "note",
            display: "Ghi chú",
            default: "",
            type: "text",
            readonly: false,
        },
    ];
    $scope.id = 0;
    $scope.item = {};
    $scope.selectedStatus = {};
    $scope.extendQuerys = "with_product=true";

    for (let field of $scope.fields.filter((v) => !v.readonly)) {
        $scope.item[field.field] = field.default;
    }

    $scope.showEdit = (item) => {
        const url =
            $scope.baseUrl +
            "/api/admin/invoice-details?page=1&limit=9999&with_detail=true&invoice_id=" +
            item.id;
        $http.get(url).then((res) => {
            if (res.data.status == true) {
                $scope.inoivceDetails = res.data.data;
            } else {
                $scope.inoivceDetails = [];
            }
        });
        $scope.id = item.id;
        $scope.selectedStatus = $scope.status.find((v) => v.id == item.status);
        for (let field of $scope.fields.filter((v) => !v.readonly)) {
            $scope.item[field.field] = item[field.field];
        }
        $scope.editting = true;
        $scope.deleting = false;
    };
    $scope.save = () => {
        let item = {};
        for (let field of $scope.fields.filter((v) => !v.readonly)) {
            item[field.field] = $scope.item[field.field];
        }
        let index = document.getElementById("select")?.selectedIndex ?? -1;
        if (index >= 0) {
            $scope.selectedStatus = $scope.status[index];
            item.status = $scope.selectedStatus.id;
        }
        if ($scope.editting) {
            $scope.update($scope.id, item);
        } else if ($scope.deleting) {
            $scope.delete($scope.id);
        }
    };
    $scope.showDelete = (id) => {
        $scope.id = id;
        $scope.deleting = true;
        $scope.editting = false;
    };
    $scope.products = [];
    $http.get($scope.baseUrl+"/api/admin/products?page=1&limit=1000").then((res) => {
        if (res.data.status == true) {
            $scope.products = res.data.data;
        }
    });
    $scope.change = () => {
        console.log($scope.file);
    };
};