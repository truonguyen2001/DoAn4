const route = "customers";
extendController = ($scope, $http) => {
    $scope.baseUrl = "https://localhost:44394";
    $scope.fields = [
        { field: "name", display: "Tên khách hàng", default: "", type: "text" },
        { field: "address", display: "Địa chỉ", default: "", type: "text" },
        { field: "phone_number", display: "Số ĐT", default: "", type: "text" },
        { field: "debt", display: "Số tiền nợ",readonly:true, default: "", type: "int" },
        //{ field: "birth", display: "Ngày sinh", default: "", type: "date" },
        { field: "bank_number", display: "Số tài khoản", default: "", type: "text" },
        { field: "bank_name", display: "Tên tài khoản", default: "", type: "text" },
    ];
    $scope.item = {};
    for (let field of $scope.fields) {
        $scope[field.field] = field.default;
    }

    for (let field of $scope.fields.filter((v) => !v.readonly)) {
        $scope.item[field.field] = field.default;
    }

    $scope.showEdit = (item) => {
        for (let field of $scope.fields) {
            $scope.item[field.field] = item[field.field];
        }
        $scope.id = item.id;
        $scope.editting = true;
        $scope.deleting = false;
    };

    $scope.showAddNew = () => {
        for (let field of $scope.fields.filter((v) => !v.readonly)) {
            $scope.item[field.field] = field.default;
        }
        $scope.editting = false;
        $scope.deleting = false;
    };
    $scope.save = () => {
        let item = {};
        for (let field of $scope.fields) {
            item[field.field] = $scope.item[field.field];
        }
        if ($scope.editting) {
            $scope.update($scope.id, item);
        } else if ($scope.deleting) {
            $scope.delete($scope.id);
        } else {
            $scope.create(item);
        }
    };

    $scope.showDelete = (id) => {
        $scope.id = id;
        $scope.deleting = true;
        $scope.editting = false;
    };
};
