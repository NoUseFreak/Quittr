'use strict';

angular
    .module('quittr.projects', ['ngRoute'])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider
            .when('/projects', {
                templateUrl: 'views/projects.html',
                controller: 'ProjectsCtrl'
            });
    }])
    .controller('ProjectsCtrl', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
        $http
            .get('/data/projects.json')
            .success(function(data) {
                $scope.projects = data;
            });
    }])
    .controller('ControllerName', ['$scope', function($scope) {
        $scope.test = 'sdfsdfsd';
    }]);
