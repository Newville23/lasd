'use strict';

angular.module('Servapp',[])

.factory('Datos',['$http', function ($http){

	var todoDatos = {};

	todoDatos.contenido={};

	todoDatos.profesores=
		$http.get('scripts/json/contenido.json').success(function(data){
			return data;
		});
	

	return todoDatos;

}]);