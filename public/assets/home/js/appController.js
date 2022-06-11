"use strict";

var extendController;
const baseUrl = "";
const app = angular.module("myApp", []);
app.controller("myController", function ($scope, $http, $location) {
    $scope.data = [];
    $scope.totalRecords = 0;
    $scope.page = 1;
    $scope.limit = 10;
    $scope.column = "";
    $scope.sort = "asc";
    $scope.formVisible = false;
    $scope.editting = false;
    $scope.searchValue = "";
    $scope.deleting = false;
    $scope.extendQuerys = "";
    $scope.totalCart = 0;
    $scope.cart = JSON.parse(localStorage.getItem("cart") ?? "[]");
    //$scope.baseUrl = baseUrl;
    $scope.baseUrl = "https://localhost:44394";
    $scope.getDataOnInit = true;
    let sent = 0;
    $scope.$watchCollection("cart", function (newCol, oldCol, value) {
        $scope.totalCart = 0;
        if (newCol && newCol instanceof Array) {
            newCol.forEach((i) => {
                $scope.totalCart += i.quantity * i.product.out_price;
            });
        }
        localStorage.setItem("cart", JSON.stringify($scope.cart));
    });
    $scope.cart.forEach((i) => {
        sent++;
        const url = $scope.baseUrl + `/api/admin/product-details/${
            i.product_detail_id
        }`;
        $http.get(url).then((res) => {
            if (res.data.status == true) {
                i.product = res.data.data;
            }
            sent--;
            if (sent == 0) {
                $scope.cart = [... $scope.cart];
                localStorage.setItem("cart", JSON.stringify($scope.cart));
            }
        });
    });
    if (extendController) {
        extendController($scope, $http, $location);
    }
    $scope.getList = () => {
        if (route) {
            const url = $scope.baseUrl + $scope.baseUrl + `/api/admin/${route}?page=${
                $scope.page
            }&limit=${
                $scope.limit
            }&column=${
                $scope.column
            }&sort=${
                $scope.sort
            }&search=${
                $scope.searchValue
            }&${
                $scope.extendQuerys
            }`;
            $http.get(url).then((res) => {
                if (res.data.status == true) {
                    $scope.data = res.data.data;
                    $scope.totalRecords = res.data.meta.total;
                }
            });
        }
    };
    $scope.upLoadFile = function (file, uploadUrl) {
        var fd = new FormData();
        fd.append("file", file);

        return $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {
                "Content-Type": undefined
            }
        });
    };

    $scope.getById = (id) => {
        const url = $scope.baseUrl + `/api/admin/${route}/${id}`;
        return $http.get(url).then((res) => {
            if (res.data.status == true) {
                const index = $scope.data.findIndex((v) => v.id == id);
                if (index > 0) {
                    $scope.data[index] = res.data.data;
                } else {
                    $scope.data.push(res.data.data);
                }
            }
        });
    };

    $scope.update = (id, item) => {
        const url = $scope.baseUrl + `/api/admin/${route}/${id}`;
        $http.patch(url, item).then((res) => {
            if (res.data.status == true) {
                $scope.getList();
            }
        });
    };

    $scope.create = (item) => {
        const url = $scope.baseUrl + `/api/admin/${route}`;
        $http.post(url, item).then((res) => {
            if (res.data.status == true) {
                $scope.getList();
            }
        });
    };

    $scope.delete = (id) => {
        const url = $scope.baseUrl + `/api/admin/${route}/${id}`;
        $http.delete(url).then((res) => {
            if (res.data.status == true) {
                $scope.getList();
            }
        });
    };
    $scope.loadPage = (page) => {
        if ((page) => 1 && page < $scope.totalRecords / $scope.limit) {
            $scope.page = page;
            $scope.getList();
        }
    };

    $scope.order = (column) => {
        if ($scope.column != column) {
            $scope.column = column;
        } else {
            $scope.sort = $scope.sort == "asc" ? "desc" : "asc";
        } $scope.getList();
    };

    if ($scope.getDataOnInit) 
        $scope.getList();
    


    $scope.search = (val) => {
        $scope.searchValue = val;
        $scope.getList();
    };
    $scope.$watch("data", function (value) {
        setTimeout(() => {
            $('.best-sell-slider').owlCarousel({
                autoplay: false,
                loop: false,
                smartSpeed: 1000,
                nav: true,
                dots: false,
                margin: 30,
                responsive: {
                    0: {
                        items: 1,
                        autoplay: true,
                        loop: true
                    },
                    360: {
                        items: 1,
                        autoplay: true,
                        loop: true
                    },
                    500: {
                        items: 2,
                        autoplay: true,
                        loop: true
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        }, 2000);
    });

    $scope.categories = [];
    $http.get(baseUrl + "/api/admin/categories?page=1&limit=1000&visible_only=true").then((res) => {
        if (res.data.status == true) {
            $scope.categories = res.data.data;
            setTimeout(() => {
                $(".categories__slider").owlCarousel({
                    loop: true,
                    margin: 0,
                    items: 4,
                    dots: false,
                    nav: true,
                    navText: [
                        "<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"
                    ],
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    smartSpeed: 1200,
                    autoHeight: false,
                    autoplay: true,
                    responsive: {

                        0: {
                            items: 1
                        },

                        480: {
                            items: 2
                        },

                        768: {
                            items: 3
                        },

                        992: {
                            items: 4
                        }
                    }
                });
                $('.recent-product-slider').owlCarousel({
                    autoplay: false,
                    smartSpeed: 1000,
                    nav: true,
                    loop: false,
                    dots: false,
                    items: 4,
                    margin: 30,
                    responsive: {
                        0: {
                            items: 1,
                            autoplay: true,
                            loop: true
                        },
                        360: {
                            items: 1,
                            autoplay: true,
                            loop: true
                        },
                        500: {
                            items: 2,
                            autoplay: true,
                            loop: true
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 4
                        },
                        1200: {
                            items: 5
                        },
                        1300: {
                            items: 6
                        }
                    }
                })
            }, 1000);
        }
    });
    $scope.addCart = function (value, quantity = 1) {
        quantity = Number(quantity);
        if (isNaN(quantity)) 
            quantity = 1;
        

        if (value.product) {
            value.product.details = null;
            value.product.default_detail = null;
        }
        const itemIndex = $scope.cart.findIndex((v) => v.product_detail_id == value.id);
        if (itemIndex >= 0) {
            const item = $scope.cart[itemIndex];
            item.quantity += quantity;
            $scope.cart[itemIndex] = {
                ... item
            };
        } else {
            $scope.cart.push({product_detail_id: value.id, quantity: quantity, product: value});
        }
    };

    $scope.deleteCart = function (value, quantity = 1) {
        console.log(value);
        const itemIndex = $scope.cart.findIndex((v) => v.product_detail_id == value.id);
        if (itemIndex >= 0) {
            const item = $scope.cart[itemIndex];
            if (item.quantity == quantity) 
                $scope.cart.splice(itemIndex, 1);
            else 
                item.quantity -= quantity;
            
        } else {

            $scope.cart[itemIndex] = {
                ...item
            };
        }
    };
});

app.filter("page", function () {
    return function (input, page, total, perPage, limit = 5) {
        total = parseInt(total);
        page = parseInt(page);
        perPage = parseInt(perPage);
        limit = parseInt(limit);
        page -= 2;
        if (page < 1) 
            page = 1;
        


        for (let i = 0; i < limit && (i + page - 1) * perPage <= total; i++) {
            input.push(i + page);
        }
        return input;
    };
});

app.filter("editable", function () {
    return function (input) {
        input = input.filter((v) => v.readonly == undefined || v.readonly == false);
        return input;
    };
});

app.directive("fileModel", [
    "$parse", function ($parse) {
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind("change", function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    },
]);

app.filter("visible", function () {
    return function (input) {
        input = input.filter((v) => v.hidden == undefined || v.hidden == false);
        return input;
    };
});

app.filter("value", function () {
    return function (input, field) {
        let value = input;
        const fields = field.split(".");
        for (let f of fields) {
            value = value[f];
            if (value == undefined) {
                return "";
            }
        }
        return value;
    };
});

app.config(function ($sceProvider) {
    // Completely disable SCE.  For demonstration purposes only!
    // Do not use in new projects or libraries.
    $sceProvider.enabled(false);
});
app.factory("BearerAuthInterceptor", function ($window, $q) {
    return {
        request: function (config) {
            config.headers = config.headers || {};
            const token = $window.localStorage.getItem("token");
            if (token) {
                config.headers.Authorization = "Bearer " + token;
            }
            return config || $q.when(config);
        },
        response: function (response) {
            return response || $q.when(response);
        },
        responseError: function (res) {
            if (res.status === 401) {
                localStorage.removeItem("token");
                window.location.href = "/admin/login";
            }

            return res;
        }
    };
});

// Register the previously created AuthInterceptor.
app.config(function ($httpProvider) {
    $httpProvider.interceptors.push("BearerAuthInterceptor");
});
