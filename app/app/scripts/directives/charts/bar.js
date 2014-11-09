'use strict';

angular.module('lsComponents')
	.directive('lsChartbar', function(){

		function link(scope, element, attrs){
			new Chartist.Bar('#chartist-chart', scope.datos.data, scope.datos.options);
		};
		return{
			restrict: 'E',			
			template: "<div id='chartist-chart' class='ct-chart'></div>",
			link: link
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