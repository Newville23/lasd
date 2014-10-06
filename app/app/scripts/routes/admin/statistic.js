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
  .module('appApp')
  .config(function ($stateProvider, $urlRouterProvider) {
    
    $stateProvider
      .state('estadistica.notas', {
        url: '/notas',
        templateUrl: 'views/admin/estadistica/notas.html'
      })
      .state('estadistica.progreso', {
        url: '/progreso',
        templateUrl: 'views/admin/estadistica/progresoClases.html'
      })
      .state('estadistica.inasistencias', {
        url: '/inasistencias',
        templateUrl: 'views/admin/estadistica/inasistencias.html'
      })
      .state('estadistica.recursos', {
        url: '/recursos',
        templateUrl: 'views/admin/estadistica/recursos.html'
      });

  });