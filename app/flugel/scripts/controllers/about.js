'use strict';

/**
 * @ngdoc function
 * @name estudianteApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the estudianteApp
 */
angular.module('estudianteApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
