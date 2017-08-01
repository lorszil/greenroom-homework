'use strict';

var greenroom = angular.module('greenroom', ['ngRoute'])

    .config(['$httpProvider', '$locationProvider', '$routeProvider',
        function ($httpProvider, $locationProvider, $routeProvider) {
            $httpProvider.defaults.withCredentials = true;
            $httpProvider.defaults.headers['Content-Type'] = 'application/json; charset=UTF-8';
            $httpProvider.defaults.useXDomain = true;
            delete $httpProvider.defaults.headers.common['X-Requested-With'];
            $httpProvider.defaults.headers.post["Content-Type"] = "application/json";

            $locationProvider
                .html5Mode(true)
                .hashPrefix('!');

            $routeProvider
                .when('/', {
                    templateUrl: 'index.html',
                    controller: 'TractorsCtrl'
                })

        }]);

