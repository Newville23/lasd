'use strict';

angular.module('menu', [])
	.directive('lsMenu', function(){

		function link(scope, element, attrs){
			
			scope.compararURL = function(url){

				if (location.hash === url) {
					return true;
				}else{
					return false;
				}
			}
			scope.sw = true;
		};
		return{
			restrict: 'E',			
			templateUrl: "views/menu.html",
			link: link
		};	
	})
	.controller('menu1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			nombrePrincipal: 'Menú',
			enlaces: [
				{link: '#/', nombre: 'Formularios', icon: 'fa-list-alt'},
				{link: '#/about', nombre: 'Estudiantes', icon: 'fa-user'},
				{link: '#/about', nombre: 'Docentes', icon: 'fa-group'},
				{link: '#/admin/estadistica', nombre: 'Estadisticas', icon: 'fa-bar-chart-o'}
			]		
		};
		
	}]);