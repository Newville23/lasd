'use strict';

angular.module('tabRoute', [])
	.directive('lsTabroute', function(){

		// function link(scope, element, attrs){
			
		// 	scope.compararURL = function(url){

		// 		if (location.hash === url) {
		// 			return true;
		// 		}else{
		// 			return false;
		// 		}
		// 	}
		// };
		return{
			restrict: 'E',			
			templateUrl: "views/tabRoute.html"
			//link: link
		};	
	})
	.controller('tabroute1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			clase: 'nav-tabs nav-justified',
			enlaces: [
				{link: '#/about', nombre: 'Inicio'},
				{link: '#/about', nombre: 'About1'},
				{link: '#/about', nombre: 'About2'}
			]		
		};
		
	}]);
