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
			clase: 'nav-tabs nav-justified',
			enlaces: [
				{nombre: 'Inicio', link: '.a'},
				{nombre: 'About1', link: '.b'},
				{nombre: 'About2',  link: '.c'}
			]		
		};
		$scope.datos2 = {
			clase: 'nav-pills nav-justified',
			enlaces: [
				{nombre: 'Inicio', link: '.c'},
				{nombre: 'About1', link: '.a'},
				{nombre: 'About2',  link: '.b'}
			]		
		};
		
	}]);
