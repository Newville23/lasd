'use strict';

angular.module('AppDirectiveTest', [])
	.directive('lsHeader', function(){

		function link(scope, element, attrs){
			
			scope.compararURL = function(url){

				if (location.hash === url) {
					return true;
				}else{
					return false;
				}
			}
		};
		return{
			restrict: 'E',			
			templateUrl: "views/navbar.html",
			link: link
		};	
	})
	.controller('header1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			nombrePrincipal: 'Flügel',
			logo: 'images/apple-touch-icon-144-precomposed2.png',
			enlaces: [
				{link: '#/', nombre: 'Inicio'},
				{link: '#/about', nombre: 'About'}
			],
			collapse:[
				{link: '#/', nombre: 'Ayuda'},
				{link: '#/about', nombre: 'Cerrar Sesión'}
			]			
		};
		
	}]);

