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
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.router',
    'estadisticaServices',
    'estadistica.controllers',
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
        templateUrl: 'views/admin/estadistica.html'
      })
      .state('random', {
        url: '/random',
        templateUrl: 'views/random.html'
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
