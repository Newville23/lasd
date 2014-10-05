'use strict';

angular.module('lsComponents')
	.directive('lsTabroute', function(){

		function link(scope, element, attrs){
		};
		return{
			restrict: 'E',			
			templateUrl: "views/tabRoute.html",
			link: link
		};	
	})
	.controller('tabroute1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			clase: 'nav-tabs nav-justified',
			enlaces: [
				{nombre: 'Inicio', link: '.a'},
				{nombre: 'About1', link: '.b'},
				{nombre: 'About2',  link: '.c'}
			]		
		};
		
	}]);
