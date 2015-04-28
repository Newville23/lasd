'use strict';

angular.module('lsComponents')
	.directive('lsTabroute', function(){

		function link(scope, element, attrs){
			
		};
		return{
			restrict: 'E',
			templateUrl: "views/components/tabRoute.html",
			scope: {
		    	datos: '=info'
		    },
			link: link
		};	
	})
	.controller('tabroute', ['$scope','$location', function($scope){
		$scope.datos1 = {
			clase: 'nav-tabs nav-justified col-md-7',
			claseBody: 'col-md-3',
			enlaces: [
				{nombre: 'Inicio', link: '.a'},
				{nombre: 'About1', link: '.b'},
				{nombre: 'About2',  link: '.c'}
			]		
		};
		$scope.estadistica = {
			clase: 'nav-pills nav-stacked col-md-3',
			claseBody: 'col-md-9',
			enlaces: [
				{nombre: 'Notas', link: '.notas'},
				{nombre: 'Progreso clases', link: '.progreso'},
				{nombre: 'Inasistencias', link: '.inasistencias'},
				{nombre: 'Recursos',  link: '.recursos'}
			]		
		};
		
	}]);
