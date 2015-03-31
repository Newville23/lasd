'use strict';

/**
 * @ngdoc function
 * @name estudianteApp.controller:ContenidoCtrl
 * @description
 * # ContenidoCtrl
 * Controller of the estudianteApp
 */
angular.module('estudianteApp')
  .controller('ContenidoCtrl', ['$http','$scope','$mdSidenav','$timeout', '$mdBottomSheet','Datos', function ($http,$scope,$mdSidenav,$timeout,$mdBottomSheet,Datos) {

  		$scope.toggleSidenav = function(menuId) {
		$mdSidenav(menuId).toggle();
	};

	$scope.clases =[{curso:'10A', materia:'Matematicas'},{curso:'8B', materia:'Geometria'},{curso:'7E', materia:'Matematicas'},{curso:'8F', materia:'Matematicas'}];

	
	$http.get('scripts/json/contenido.json').success(function (data){
		$scope.Logros = data.contenido;
		console.log(data.calificaciones);
		$scope.tabla = {
			datos:data.calificaciones,
			header:data.calificaciones[1]
		};
	});



  }]);
