angular.module('Dirapp',[])

.directive('aCordeon', function (){
	return{
		restrict: 'E',
		templateUrl:'views/contenido/acordeon.html',
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
		templateUrl:'views/navtab.html',
		controller:['$scope', function ($scope){
			$scope.navTab =[
			{Nombre:'Contenido',classe:'',icon:'fa fa-list-alt fa-lg',state:'Docente.Contenido'},
			{Nombre:'Foro ',classe:'',icon:'fa fa-comments-o fa-lg fa-fw',state:'Docente.Foro'},
			{Nombre:'Estudiantes',classe:'',icon:'fa fa-users fa-lg fa-fw',state:'Docente.Estudiantes'},
			{Nombre:'Trabajos',classe:'',icon:'fa fa-tasks fa-lg fa-fw',state:'Docente.Trabajos'}
			];
		}],
		link: function link(scope, element, attrs){
			//console.log(location)
		}

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
  	templateUrl: "views/iTable.html",
  	link: link

  };
})
.directive('toggle', function(){
  return {
    restrict: 'A',
    link: function(scope, element, attrs){
      if (attrs.toggle=="tooltip"){
        $(element).tooltip();
      }
      // if (attrs.toggle=="popover"){
      //   $(element).popover();
      // }
    }
  };
})
.directive('modalNewLogro', function (){
	return{
		restrict: 'E',
		templateUrl:'views/contenido/modals/modalNewLogro.html'
	};

})
.directive('modalAddEvaluaciones', function (){
	return{
		restrict: 'E',
		templateUrl:'views/contenido/modals/modalAddEvaluaciones.html'
	};

})
.directive('modalVernotas', function (){
	return{
		restrict: 'E',
		templateUrl:'views/modalverNotas.html'
	};

})
.directive('modalAddNotas', function (){
	return{
		restrict: 'E',
		templateUrl:'views/modalAddNotas.html'
	};

})
.directive('modalEditEvaluacion', function (){
	return{
		restrict: 'E',
		templateUrl:'views/modalEditEvaluacion.html'
	};

})
.directive('modalEliminar', function (){
	return{
		restrict: 'E',
		templateUrl:'views/modalEliminar.html'
	};

})
.directive('tablaEvaluaciones', function (){
	return{
		restrict: 'E',
		templateUrl:'views/contenido/tablaEvaluaciones.html'
	};

})
.directive('tablaVernotas', function (){
	return{
		restrict: 'E',
		templateUrl:'views/tablaverNotas.html'
	};

})
.directive('wellLogros', function (){
	return{
		restrict: 'E',
		templateUrl:'views/contenido/wellLogros.html'
	};

})
.directive('tablaEstudiantesaddnotas', function (){
	return{
		restrict: 'E',
		templateUrl:'views/tablaEstudiantesaddNotas.html'
	};

})
.directive('modalDetalle', [function () {
	return {
		restrict: 'E',
		templateUrl:'views/estudiantes/dialogos/modalestudiante.html'
	};
}])
.directive('detalleEstudiante', [function () {
	return {
		restrict: 'E',
		templateUrl:'views/estudiantes/dialogos/detalle.html'
	};
}])
