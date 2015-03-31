'use strict';

/**
 * @ngdoc overview
 * @name estudianteApp
 * @description
 * # estudianteApp
 *
 * Main module of the application.
 */
angular
  .module('estudianteApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngTouch',
    'ngMaterial',
    'ui.router',
    'Dirapp',
    'Servapp'
  ])
  .config(function ($stateProvider, $urlRouterProvider, $mdThemingProvider) {

  $mdThemingProvider.theme('top')
    .primaryPalette('grey', {
      'default': '100', // by default use shade 400 from the gray palette for primary intentions
      'hue-1': '800', // use shade 100 for the <code>md-hue-1</code> class
      'hue-2': '700', // use shade 600 for the <code>md-hue-2</code> class
      'hue-3': '300' // use shade A100 for the <code>md-hue-3</code> class
    });


    $urlRouterProvider.otherwise("/");

    $stateProvider
    .state('home', {
      url: '/',
      templateUrl: 'views/home/index.html'
    })

    .state('9B', {
      url: '/9B',
      templateUrl: 'views/cursos/index.html'
    })

    .state('10A', {
      url: '/10A',
      templateUrl: 'views/cursos/index.html'
    })

   .state('11D', {
      url: '/11D',
      templateUrl: 'views/cursos/index.html'
    })

    .state('9B.Estudiantes', {
      url: '/estudiantes',
       templateUrl: 'views/estudiantes/index.html',
      controller: 'EstudiantesCtrl'
    })

    .state('9B.Contenido', {
      url: '/contenido',
       templateUrl: 'views/contenido/index.html',
      controller: 'ContenidoCtrl'
    })
    .state('9B.Foro', {
      url: '/foro',
       templateUrl: 'views/foro/index.html',
      controller: 'ForoCtrl'
    })
    .state('9B.Trabajos', {
      url: '/trabajos',
       templateUrl: 'views/trabajos/index.html',
      controller: 'TrabajosCtrl'
    })
    .state('9B.Mensajes', {
      url: '/mensajes',
       templateUrl: 'views/mensajes/index.html',
      controller: 'MensajesCtrl'
    });
 
  });
