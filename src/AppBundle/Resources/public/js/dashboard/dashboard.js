'use strict';

angular
    .module('quittr.dashboard', ['ngRoute'])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '/views/dashboard.html',
                controller: 'DashboardCtrl'
            });
    }])
    .controller('DashboardCtrl', [function() {

    }]);