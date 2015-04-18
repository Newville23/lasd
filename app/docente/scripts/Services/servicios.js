angular.module('Servapp',[])

.factory('Datos',['$http', function ($http){

	var todoDatos = {};

	todoDatos.contenido={};

	todoDatos.profesores=
		$http.get('scripts/Json/contenido.json').success(function(data){
			return data;
		});
	

	return todoDatos;

}]);