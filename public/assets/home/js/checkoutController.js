const route = "product-details";
extendController = ($scope, $http) => {
    $scope.invoice = {
        total: 0,
    };
    $scope.href = "Thanh toán";
    $scope.id = 0;
    $scope.item = {};
    $scope.save = () => {
        if ($scope.deleting) {
            const detail = $scope.details[$scope.id];
            $scope.invoice.total -=
                detail.quantity * detail.productDetail.out_price;
            $scope.details.splice($scope.id, 1);
        } else {
            $scope.addDetail();
        }
    };
    $scope.saveInvoice = () => {
        const url = $scope.baseUrl + "/api/admin/invoices";
        $scope.invoice.status = $scope.selectedStatus?.id;
        $scope.cart.forEach((c) => {
            $scope.details.push({
                product_detail_id: c.product_detail_id,
                quantity: c.quantity,
            });
        });
        $scope.invoice.customer_name = $scope.customer.name;
        $scope.invoice.phone_number = $scope.customer.phone;
        $scope.invoice.address = $scope.customer.town;
        $scope.invoice.address += ", " + $scope.customer.district;
        $scope.invoice.address += ", " + $scope.customer.commune;
        $scope.invoice.address += ", " + $scope.customer.address;
        $scope.invoice.address = $scope.invoice.address.replace("^/(,+|\s+)+|(,+|\s+)+$/gm", '');
        $scope.invoice.status = 0;
        $scope.invoice.paid = 0;
        $http.post(url, $scope.invoice).then((res) => {
            if (res.data.status == true) {
                const id = res.data.data;
                const addDetailUrl =
                    $scope.baseUrl + "/api/admin/invoice-details";
                $scope.details.forEach((detail) => {
                    $http.post(addDetailUrl, {
                        product_detail_id: detail.product_detail_id,
                        invoice_id: id,
                        quantity: detail.quantity,
                    });
                });
                $scope.cart = [];
                window.location.href = "/contact?message=1&id=" + id;
            }
        });
        alert("Đặt hàng thành công")
    };

    $scope.details = [];
};