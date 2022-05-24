const route = "imports";
extendController = ($scope, $http) => {
    $scope.baseUrl = "https://localhost:44394";
    $scope.fields = [
        { field: "product_name", display: "Tên sản phẩm", default: "", type: "text" },
        { field: "quantity", display: "Số lượng", default: "", type: "int" },
        { field: "total", display: "Đơn giá", default: "", type: "long" },
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
