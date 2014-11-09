'use strict';

angular.module('lsComponents')
	.directive('lsTable', function(){

		function link(scope, element, attrs){
			scope.ObjtoArray = function(array){
				return _.map(array, function(obj){
					//console.log(obj);
					//console.log(_.toArray(obj));
					return _.toArray(obj);
				});			
			};

			scope.predicate = '0';
			scope.reverse = false;
			scope.tableOrder = function(val){
				if (scope.predicate == val.toString()) {
					scope.reverse = !scope.reverse;
				}else{
					scope.reverse = false;
					scope.predicate = val.toString();
				}
				
			};

			scope.tabla.datos = scope.ObjtoArray(scope.tabla.datos);
			scope.limite = scope.tabla.datos.length;
			
		};
		return{
			restrict: 'E',			
			templateUrl: "views/components/table.html",
			link: link
		};	
	})
	.controller('table1', ['$scope', function($scope){
		$scope.tabla = {
			header: ['Link', 'Nombre', 'Icon', 'Otro', 'Anita'],
			tableClass: "table-striped table-hover table-responsive panel",
			datos: [
				{link:'home', nombre: 'Formularios', icon: 'fa-list-alt', otro: 'mama', Bueno: 1},
				{link:'about', nombre:'Estudiantes', icon:'fa-user', otro: 'mama', Bueno: 2},
				{link:'about Lorem ipsum dolor si voluptas nobis reicien', nombre:'Docentes', icon:'fa-group', otro: 'mama', Bueno: 3},
				{link:'estadistica', nombre:'Estadisticas', icon:'fa-bar-chart-o', otro: 'mama', Bueno: 2},
				{link:'estadistica', nombre:'Estadisticas', icon:'fa-bar-chart-o', otro: 'mama', Bueno: 5}
			]		
		};
	}]);