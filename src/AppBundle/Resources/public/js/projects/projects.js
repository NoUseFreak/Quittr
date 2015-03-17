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
    .controller('ProjectsCtrl', ['$scope', '$http', function($scope, $http) {
        $http
            .get('/data/projects.json')
            .success(function(data) {
                $scope.filteredProjects = [];
                $scope.currentPage = 1;
                $scope.numPerPage = 10;

                $scope.projects = data;
                $scope.totalItems = data.length;

                $scope.numPages = function () {
                    return Math.ceil($scope.filteredProjects.length / $scope.numPerPage);
                };
                $scope.resetList = function() {
                    $scope.currentPage = 1;
                };

                $scope.$watch('currentPage + numPerPage', function() {
                    var begin = (($scope.currentPage - 1) * $scope.numPerPage);
                    var end = begin + $scope.numPerPage;

                    $scope.filteredProjects = $scope.projects.slice(begin, end);
                });
            });
    }])
    .controller('NewProjectCtrl', ['$scope', function($scope) {

    }]);
