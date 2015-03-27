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
    var data = [{"idestudiante": "332323", "asistencia": "si"},
    					{"idestudiante": "12121212", "asistencia": "si"},
    					{"idestudiante": "114312413", "asistencia": "si"},
              {"idestudiante": "342345345345", "asistencia": "si"}];
    
    $http.post('http://localhost:3000/0.0.1/docente/asistencia.json?idclase=13775731636734635&numeroEstudiantes=4&fecha=2015-03-24', data).
	  success(function(data, status, headers, config) {
	    console.log(data);
	  }).
	  error(function(data, status, headers, config) {
	    console.log(data);
	  });



  });
