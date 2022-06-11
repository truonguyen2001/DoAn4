const route = "products";
extendController = function ($scope, $http, $location) {
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    $scope.categories = [];
    $scope.extendQuerys = "visible_only=true&consumable_only=true";
    const categoryId = params.category;
    if (categoryId) $scope.extendQuerys = "category=" + categoryId + "&";
    $http
        .get(baseUrl + "/api/admin/categories?page=1&limit=1000")
        .then((res) => {
            if (res.data.status == true) {
                $scope.categories = res.data.data;
            }
        });
    $scope.page = 1;
    $scope.limit = 9999;
    $scope.column = "created_at";
    $scope.sort = "desc";
    $scope.href = "Shop";
    $scope.searchValue = params.search ?? "";
    $scope.$watchCollection(
        "data",
        function () {
            $(".latest-product__slider").owlCarousel({
                loop: true,
                margin: 0,
                items: 1,
                dots: false,
                nav: true,
                navText: [
                    "<span class='fa fa-angle-left'><span/>",
                    "<span class='fa fa-angle-right'><span/>",
                ],
                smartSpeed: 1200,
                autoHeight: false,
                autoplay: true,
            });
        },
        true
    );
};