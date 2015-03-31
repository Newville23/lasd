'use strict';

angular.module('Dirapp',[])

.directive('aCordeon', function (){
	return{
		restrict: 'E',      
		templateUrl:'views/contenido/componentes/acordeon.html',
		controller:['$scope', function ($scope){
			$scope.Periodos =[
			{periodo:'Primer Perido',targetid:'primero',expanded:true,id:'1'},
			{periodo:'Segundo Perido',targetid:'segundo',expanded:false,id:'2'},
			{periodo:'Tercer Perido',targetid:'tercero',expanded:false,id:'3'},
			{periodo:'Cuarto Perido',targetid:'cuarto',expanded:false,id:'4'}
			];
		}]

	};

})
.directive('navTab', function (){
	return{
		restrict: 'E',      
		templateUrl:'views/contenido/componentes/navtab.html',
		controller:['$scope', function ($scope){
			$scope.navTab =[
			{Nombre:'Contenido',classe:'active',icon:'fa fa-list-alt fa-lg',state:'Contenido'},
			{Nombre:'Evaluaciones',classe:'',icon:'fa fa-flask fa-lg',state:'Evaluaciones'},
			{Nombre:'Foro ',classe:'',icon:'fa fa-comments-o fa-lg fa-fw',state:'Foro'},
			{Nombre:'Estudiantes',classe:'',icon:'fa fa-users fa-lg fa-fw',state:'Estudiantes'},
			{Nombre:'Trabajos',classe:'',icon:'fa fa-tasks fa-lg fa-fw',state:'Trabajos'}
			];
		}]

	};

})
.directive('iTable', function(){

	function link(scope, element, attrs){

		scope.ObjtoArray = function(array){
         return _.map(array, function(obj){
                      return _.toArray(obj);
                     });
        };

		scope.TablaHeader = function(obj){
			return _.keys(obj);
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
		scope.tabla.header = scope.TablaHeader(scope.tabla.header);
      // scope.limite = scope.tabla.datos.length;
  }; 

  return {
  	restrict: 'E',
  	templateUrl: "views/contenido/componentes/iTable.html",
  	link: link

  };
});