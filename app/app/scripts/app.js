'use strict';

/**
 * @ngdoc overview
 * @name appApp
 * @description
 * # appApp
 *
 * Main module of the application.
 */
angular
  .module('appApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.router',
    'lsComponents'
  ])
  .config(function ($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/');

    $stateProvider
      .state('home', {
        url: '/',
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .state('about', {
        url: '/about',
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .state('estadistica', {
        url: '/admin/estadistica',
        templateUrl: 'views/estadistica.html'
      })

      // nested list with just some random string data
      .state('about.a', {
        url: '/a',
        template: 'hola mundo a'
      })
      .state('about.b', {
        url: '/b',
        template: 'hola mundo b'
      })
      .state('about.c', {
        url: '/c',
        template: 'hola mundo c'
      });

  });
