'use strict';

angular.module('lsComponents')
	.directive('lsTable', function(){

		function link(scope, element, attrs){
			//scope.sw = true;
		};
		return{
			restrict: 'E',			
			templateUrl: "views/components/table.html",
			link: link
		};	
	})
	.controller('table1', ['$scope', function($scope){
		$scope.tabla = {
			header: ['Link', 'Nombre', 'Formularios', 'Icon'],
			datos: [
				{link: 'home', nombre: 'Formularios', icon: 'fa-list-alt'},
				{link: 'about', nombre: 'Estudiantes', icon: 'fa-user'},
				{link: 'about', nombre: 'Docentes', icon: 'fa-group'},
				{link: 'estadistica', nombre: 'Estadisticas', icon: 'fa-bar-chart-o'}
			]		
		};
		
	}]);