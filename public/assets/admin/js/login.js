"use strict";

const app = angular.module("myApp", []);
app.controller("myController", function ($scope, $http) {
    $scope.data = {};
    $scope.login = function() {
        const url = `/api/admin/login`;
        $http.post(url, $scope.data).then((res) => {
            if (res.data.status == true) {
                localStorage.setItem('token',res.data.meta.token);
                window.location.href = "/admin"
            }
        });
    }
});
