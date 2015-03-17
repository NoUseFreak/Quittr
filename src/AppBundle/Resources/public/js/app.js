'use strict';

// Declare app level module which depends on views, and components
angular
    .module('quittr', [
        'ngRoute',
        'quittr.dashboard',
        'quittr.page',
        'quittr.projects',
        'ui.bootstrap'
    ])
    .config(['$routeProvider', '$logProvider', function($routeProvider, $logProvider) {
        $routeProvider.otherwise({redirectTo: '/'});
        $logProvider.debugEnabled(true);
    }])
    .filter('rawHtml', ['$sce', function($sce){
        return function(val) {
            return $sce.trustAsHtml(val);
        };
    }])
    .filter('startFrom', function () {
        return function (input, start) {
            if (input) {
                start = +start;
                return input.slice(start);
            }
            return [];
        };
    });