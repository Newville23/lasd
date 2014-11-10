'use strict';

/* Controllers */

angular.module('estadistica.controllers', [])
	.controller('notasCtrl', ['$scope', '$routeParams', 'Notas', function($scope, $http, Notas){

		$scope.ObjtoArray = function(array){
				return _.map(array, function(obj){
					return _.toArray(obj);
				});			
		};
		
		$scope.datos = {
			data: {
				labels: [],
				series: [
					[]
				]	
			},
			options: {
				height: '250px',
				chartPadding: 0,
			}
		};

		$scope.tabla = {
			tableClass: "table-striped table-hover table-responsive panel",
			header: [],
			datos: []		
		};
		
		Notas.get(function(data){
			$scope.datos.data.labels = _.pluck(data.datos.grados, 'nombre_curso');
			$scope.datos.data.series[0] = _.pluck(data.datos.grados, 'nota');

			$scope.tabla.header = _.keys(data.datos.grados[0]);
			$scope.tabla.datos = $scope.ObjtoArray(data.datos.grados);
			$scope.limite = $scope.tabla.datos.length;

			if (typeof($scope.attrs) !== "undefined") {
				new Chartist.Bar('#' + $scope.attrs.type, $scope.datos.data, $scope.datos.options);
			};		
		});
		
	}]);