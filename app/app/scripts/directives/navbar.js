'use strict';

angular.module('lsComponents', [])
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
			templateUrl: "views/components/navbar.html",
			link: link
		};	
	})
	.controller('header1', ['$scope','$location', function($scope){
		$scope.datos = {
			id: 1,
			nombrePrincipal: 'Flügel',
			logo: 'images/apple-touch-icon-144-precomposed2.png',
			enlaces: [
				{link: 'home', nombre: 'Inicio'},
				{link: 'about', nombre: 'About'}
			],
			collapse:[
				{link: 'home', nombre: 'Ayuda'},
				{link: 'about', nombre: 'Cerrar Sesión'}
			]			
		};
		
	}]);
