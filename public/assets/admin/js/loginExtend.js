"use strict";

var extendController;
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

app.config(function ($sceProvider) {
    $sceProvider.enabled(false);
});

app.factory('BearerAuthInterceptor', function ($window, $q) {
    return {
        request: function(config) {
            config.headers = config.headers || {};
            const token = $window.localStorage.getItem('token');
            if (token) {
                config.headers.Authorization = 'Bearer ' + token;
            }
            return config || $q.when(config);
        },
        response: function(response) {
            if (response.status === 401) {
                //  Redirect user to login page / signup Page.
            }
            return response || $q.when(response);
        }
    };
});

// Register the previously created AuthInterceptor.
app.config(function ($httpProvider) {
    $httpProvider.interceptors.push('BearerAuthInterceptor');
});