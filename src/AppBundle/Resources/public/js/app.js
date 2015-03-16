'use strict';

// Declare app level module which depends on views, and components
angular
    .module('quittr', [
        'ngRoute',
        'quittr.dashboard',
        'quittr.page',
        'quittr.projects'
    ])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.otherwise({redirectTo: '/'});
    }])
    .filter('rawHtml', ['$sce', function($sce){
        return function(val) {
            return $sce.trustAsHtml(val);
        };
    }]);;