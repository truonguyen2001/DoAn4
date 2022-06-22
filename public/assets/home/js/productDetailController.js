const route = "products";
extendController = function ($scope, $http, $location) {
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    const paths = location.pathname.trim("/").split("/");
    const productId = paths[paths.length - 1];
    if (!isNaN(Number(productId))) {
        $http.get(baseUrl + "/api/admin/products/" + productId).then((res) => {
            if (res.data.status == true) {
                $scope.product = res.data.data;
                $scope.href = $scope.product.name;
                if ($scope.product?.category_id) $scope.extendQuerys = "category=" + $scope.product.category_id;
                $scope.getList();
                $scope.detail = $scope.product.details.find(
                    (d) => d.out_price == $scope.product.min_price
                );
                setTimeout(() => {
                    $('.product-dec-slider-2').slick({
                        infinite: true,
                        slidesToShow: 4,
                        arrows:false,
                        slidesToScroll: 1,
                        responsive: [{
                                breakpoint: 992,
                                Settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 767,
                                Settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 479,
                                Settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                }, 2000);
            }
        });
    }
    $scope.categories = [];
    $scope.quantity = 1;
    $scope.page = 1;
    $scope.limit = 5;
    $scope.column = "created_at";
    $scope.sort = "desc";
    $scope.href = "Sản phẩm";
    $scope.extendQuerys = "visible_only=true&consumable_only=true";
    $scope.$watch("quantity", function (value) {
        if (value < 1) {
            $scope.quantity = 1;
        }
    });
    $scope.$watch("data", function (value) {
        const index = $scope.data.findIndex((v) => v.id == productId);
        if (index >= 0) $scope.data.splice(index, 1);
        else $scope.data.pop();
    });
    $scope.$watch("detail", function (value) {
        $scope.price = value?.out_price ?? 0;
    });
    $scope.setDetail = (d) => {
        $scope.detail = d;
    };
};