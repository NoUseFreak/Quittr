'use strict';

angular
    .module('quittr.page', ['ngRoute'])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider
            .when('/page/:page', {
                templateUrl: 'views/page.html',
                controller: 'PageCtrl'
            });
    }])
    .controller('PageCtrl', ['$scope', '$routeParams', '$http', '$sce', function($scope, $routeParams, $http, $sce) {
        $http
            .get('/data/page.json?alias=' + $routeParams.page)
            .success(function(data) {
                $scope.title = data.title;
                $scope.content = $sce.trustAsHtml(data.content);
            });
    }]);