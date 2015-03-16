'use strict';

// Declare app level module which depends on views, and components
angular
    .module('quittr', [
        'ngRoute',
        'quittr.dashboard',
        'quittr.page'
    ])
    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.otherwise({redirectTo: '/'});
    }]);