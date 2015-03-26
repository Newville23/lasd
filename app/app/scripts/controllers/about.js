'use strict';

/**
 * @ngdoc function
 * @name appApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the appApp
 */
angular.module('appApp')
  .controller('AboutCtrl', function ($scope, $http) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    var data = [{"Estudiante_identificacion": "114212", "Asistencia": "si"},
    					{"Estudiante_identificacion": "4534645", "Asistencia": "no"},
    					{"Estudiante_identificacion": "121212", "Asistencia": "no"}];
    
    $http.post('http://localhost:3000/0.0.1/docente/asistencia.json?idclase=13775731636734635&numeroEstudiantes=3', data).
	  success(function(data, status, headers, config) {
	    console.log(data);
	  }).
	  error(function(data, status, headers, config) {
	    console.log(data);
	  });



  });
