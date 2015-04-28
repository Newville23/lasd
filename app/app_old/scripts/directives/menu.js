'use strict';

angular.module('lsComponents')
	.directive('lsMenu', function(){

		function link(scope, element, attrs){
			scope.sw = true;
		};
		return{
			restrict: 'E',			
			templateUrl: "views/components/menu.html",
			link: link
		};	
	})
	.controller('menu1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			nombrePrincipal: 'Menú',
			enlaces: [
				{link: 'home', nombre: 'Formularios', icon: 'fa-list-alt'},
				{link: 'about', nombre: 'Estudiantes', icon: 'fa-user'},
				{link: 'about', nombre: 'Docentes', icon: 'fa-group'},
				{link: 'estadistica', nombre: 'Estadisticas', icon: 'fa-bar-chart-o'}
			]		
		};
		
	}]);