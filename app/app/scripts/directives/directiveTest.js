'use strict';

angular.module('AppDirectiveTest', [])
	.directive('lsHeader', function(){
		return{
			restrict: 'E',
			templateUrl: "views/header.html"
		};	
	});