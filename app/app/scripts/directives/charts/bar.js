'use strict';

angular.module('lsComponents')
	.directive('lsChartbar', function(){

		function link(scope, element, attrs){

			scope.attrs = attrs;
			new Chartist.Bar('#' + attrs.type, scope.datos.data, scope.datos.options);
		};
		return{
			restrict: 'E',	
			link: link,		
			template: function(element, attrs){
				return "<div id='" + attrs.type + "' class='ct-chart'></div>";
			}
			
		};	
	})
	.controller('bar1', ['$scope','$location', function($scope){
		$scope.datos = {
			data: {
				labels: ['primero', 'segundo', 'tercero', 'W4', 'W5', 'W6', 'W7', '8', '9', '10'],
				series: [
					[1, 2, 4, 8, 6, 2, 1, 4, 6, 2]
				]	
			},
			options: {
				height: '300px',
				chartPadding: 0,
				axisX: {
					// labelInterpolationFnc: function(value, index) {
					// 	return index % 2 === 0 ? value : null;
					// }
				}
			}
		};
		
	}]);